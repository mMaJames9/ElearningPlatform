<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Classroom;
use App\Models\Document;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Response as HttpResponse;
use Spatie\PdfToImage\Pdf;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documents = Document::all()->sortByDesc("created_at");

        $dataBook = Document::where('document_type', 'Book')->count();
        $dataPaper = Document::where('document_type', 'Paper')->count();

        return view('admin.documents.index', compact('documents', 'dataPaper', 'dataBook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::all()->pluck('subject_name', 'id');
        $classrooms = Classroom::all()->pluck('classroom_name', 'id');
        $exams = Exam::all()->pluck('exam_name', 'id');

        return view('admin.documents.create', compact('subjects', 'classrooms', 'exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        if ($request->hasFile('document_path'))
        {
            $documentPath =  $request->document_path;
            $nameDocument = $documentPath->hashName();
            $docPath = public_path('storage/uploads/documents');
            $documentPath->move($docPath, $nameDocument);

            $pdfThumb = new Pdf($docPath . '/' . $nameDocument);
            $thumbnailPath = public_path('storage/uploads/documents/thumbnails');
            $thumbName = "thumb-" . strtolower(str_replace(['.pdf', ' '], ['', '-'], $nameDocument)) . ".png";
            $thumbnail = $pdfThumb->setPage(1)
            ->setOutputFormat('png')
            ->setResolution(32)
            ->saveImage($thumbnailPath . '/' . "$thumbName");
        }

        if ($request->hasFile('correction_path'))
        {
            $correctionPath =  $request->correction_path;
            $nameCorrection = $correctionPath->hashName();
            $corrPath = public_path('storage/uploads/corrections');
            $correctionPath->move($corrPath, $nameCorrection);
        }

        $document = Document::create([
            'exam_id' => $request['exam_id'],
            'document_session' => $request['document_session'] ?? null,
            'document_title' => $request['document_title'] ?? null,
            'document_type' => $request['document_type'],
            'document_description' => $request['document_description'] ?? null,
            'document_path' => $nameDocument,
            'document_thumbnail' => $thumbName,
            'correction_path' => $nameCorrection ?? null,
        ]);

        $document->subjects()->sync($request->input('subjects', []));
        $document->classrooms()->sync($request->input('classrooms', []));

        $status = 'A new document was added successfully.';

        return redirect()->route('documents.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->load('subjects');
        $document->load('classrooms');

        $exams = Exam::all()->pluck('exam_name', 'id');

        return view('admin.documents.show', compact('document', 'exams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::all()->pluck('subject_name', 'id');
        $classrooms = Classroom::all()->pluck('classroom_name', 'id');

        $exams = Exam::all()->pluck('exam_name', 'id');

        $document->load('subjects');
        $document->load('classrooms');

        return view('admin.documents.edit', compact('subjects', 'classrooms', 'document', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {

        if ($request->hasFile('document_path'))
        {
            $request->validate([
                'document_path' => ['required', 'mimes:pdf', 'max:12288'],
            ]);

            if ($oldDocumentPath = $document->document_path)
            {
                $oldThumbFile = $document->document_thumbnail;
                unlink(public_path('storage/uploads/documents/') . $oldDocumentPath);
                unlink(public_path('storage/uploads/documents/thumbnails/') . $oldThumbFile);
            }

            $documentPath =  $request->document_path;
            $nameDocument = $documentPath->hashName();
            $docPath = public_path('storage/uploads/documents');
            $documentPath->move($docPath, $nameDocument);

            $pdfThumb = new Pdf($docPath . '/' . $nameDocument);
            $thumbnailPath = public_path('storage/uploads/documents/thumbnails');
            $thumbName = "thumb-" . strtolower(str_replace(['.pdf', ' '], ['', '-'], $nameDocument)) . ".png";
            $thumbnail = $pdfThumb
            ->setPage(1)
            ->setOutputFormat('png')
            ->setResolution(32)
            ->saveImage($thumbnailPath . '/' . "$thumbName");

            $document->document_path = $nameDocument;
            $document->document_thumbnail = $thumbName;
        }

        if ($request->hasFile('correction_path'))
        {
            $request->validate([
                'correction_path' => ['required', 'mimes:pdf', 'max:12288'],
            ]);

            if ($oldCorrectionPath = $document->correction_path)
            {
                unlink(public_path('storage/uploads/corrections/') . $oldCorrectionPath);
            }

            $correctionPath =  $request->correction_path;
            $nameCorrection = $correctionPath->hashName();
            $corrPath = public_path('storage/uploads/corrections');
            $correctionPath->move($corrPath, $nameCorrection);

            $document->correction_path = $nameCorrection;
        }

        $document->exam_id = $request->exam_id;
        $document->document_session = $request->document_session ?? null;
        $document->document_title = $request->document_title ?? null;
        $document->document_description = $request->document_description ?? null;

        $document->save();

        $document->subjects()->sync($request->input('subjects', []));
        $document->classrooms()->sync($request->input('classrooms', []));


        $status = 'The document was updated successfully.';

        return redirect()->route('documents.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $document = Document::FindOrFail($id);

        // $documentPath = public_path("storage/uploads/documents/{$document->document_path}");
        // $CorrectionPath = public_path("storage/uploads/corrections/{$document->correction_path}");

        // if(File::exists($documentPath))
        // {
        //     File::delete($documentPath);
        // }

        // if(File::exists($CorrectionPath))
        // {
        //     File::delete($CorrectionPath);
        // }

        $document->delete();

        $status = 'The document was deleted successfully.';

        return redirect()->route('documents.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Download the specified resource from the public_path.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDownload()
    {
        abort_if(Gate::denies('document_donwload'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptionPlan = auth()->user()->subscription->plan->name ?? null;

        if ($subscriptionPlan === null) {
            return redirect()->back()->with('status', 'You have no active plan.');
        }

        $feature = match ($subscriptionPlan) {
            'Silver Monthly', 'Silver Yearly', 'Trial' => 'download-documents-limited',
            'Gold Monthly', 'Gold Yearly'              => 'download-documents-unlimited',
        };

        if (auth()->user()->cantConsume($feature, 1)) {
            $message = match ($subscriptionPlan)
            {
                'Silver Monthly', 'Silver Yearly' => 'You can download only 10 documents on Silver plan',
                'Trial'                           => "You can download only 3 documents on Free Trial, please [<a href='/user/plans/' class='hover:underline'>choose your plan</a>]",
            };

            return redirect()->back()->with('status', $message);
        }

        $document = public_path('storage/uploads/documents');

        $headers = ['Content-Type: application/pdf'];

        if (file_exists($document)) {
            return HttpResponse::download($document, 'plugin.pdf', $headers);
        }
        else
        {
            $status = 'Sorry! But... Document not found.';

            return redirect()->back()->with([
                'status' => $status,
            ]);
        }
    }
}
