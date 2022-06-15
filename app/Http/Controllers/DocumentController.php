<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;

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
        $exams = Exam::all()->pluck('exam_name', 'id');
        return view('admin.documents.create', compact('subjects', 'exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        $document_serie = $request->document_serie;
        $document_serie = implode(', ', $document_serie);

        $documentPath = $request['document_path']->store('uploads/documents', 'public');

        if( ! empty($request['correction_path']))
        {
            $correctionPath = $request['correction_path']->store('uploads/corrections', 'public');
        }

        $document = Document::create([
            'exam_id' => $request['exam_id'],
            'document_serie' => $document_serie ?? null,
            'document_session' => $request['document_session'] ?? null,
            'document_title' => $request['document_title'] ?? null,
            'document_type' => $request['document_type'],
            'document_description' => $request['document_description'] ?? null,
            'document_price' => $request['document_price'],
            'document_path' => $documentPath,
            'correction_path' => $correctionPath ?? null,
        ]);

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Storage::disk('public')->delete('uploads/documents/' . $document->document_path);
        Storage::disk('public')->delete('uploads/corrections/' . $document->correction_path);

        Document::where('id', $id)->delete();

        $status = 'The document was deleted successfully.';

        return redirect()->route('documents.index')->with([
            'status' => $status,
        ]);
    }
}
