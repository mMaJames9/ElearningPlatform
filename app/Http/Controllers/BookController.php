<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;

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

        $subjects = Subject::orderBy('subject_name', 'asc')->get();

        return view('member.documents.books.index', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('books', 'subjects'));
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
}
