<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Response as DonwloadResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classroomId = Auth::user()->classroom->id;

        if(FacadesRequest::get('subject'))
        {
            $checked = $_GET['subject'];

            $books = Document::whereHas('classrooms', function($query) use ($classroomId) {
                $query->where("id", $classroomId);
            })
            ->where('document_type', 'Book')
            ->whereHas('subjects', function($query) use ($checked) {
                $query->whereIn("id", $checked);
            })
            ->paginate(12);
        }
        else
        {
            $books = Document::whereHas('classrooms', function($query) use ($classroomId) {
                $query->where("id", $classroomId);
            })
            ->where('document_type', 'Book')
            ->paginate(12);
        }

        $subjects = Subject::whereHas('books')->get();

        $classStudent = Auth::user()->classroom->classroom_name;

        if (str_starts_with($classStudent, '3'))
        {
            $amount = 5000;
        } else if (str_starts_with($classStudent, 'P'))
        {
            $amount = 8000;
        } else if (str_starts_with($classStudent, 'T'))
        {
            $amount = 8000;
        }
        else
        {
            $amount = null;
        }

        return view('member.documents.books.index', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('books', 'subjects','amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $book)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->load('subjects');
        $book->load('classrooms');



        $exams = Exam::all()->pluck('exam_name', 'id');

        return view('member.documents.books.show', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('book', 'exams'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Download the specified resource from the public_path.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(Document $book)
    {
        // abort_if(Gate::denies('document_download'), Response::HTTP_FORBIDDEN, 'Accès Interdit');

        $subscriptionPlan = auth()->user()->subscription->plan->name ?? null;

        if ($subscriptionPlan === null) {
            return redirect()->back()->with('status', 'You have no active plan.');
        }

        $feature = match ($subscriptionPlan) {
            'Academic Year' => 'download-documents-unlimited',
        };

        $bookPath = $book->document_path;
        $bookFile = public_path('storage/uploads/documents/') . $bookPath;

        if (file_exists($bookFile)) {

            DocumentUser::create([
                'user_id' => Auth::user()->id,
                'document_id' => $book->id,
            ]);

            return DonwloadResponse::download($bookFile);
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
