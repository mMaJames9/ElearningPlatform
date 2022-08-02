<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PaperController extends Controller
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

        $years = Document::whereHas('classrooms', function($query) use ($classroomId) {
            $query->where("id", $classroomId);
        })
        ->where('document_type', 'Paper')
        ->orderBy('document_session', 'desc')
        ->get();

        if(FacadesRequest::get('subject'))
        {
            $checked = $_GET['subject'];

            $papers = Document::whereHas('classrooms', function($query) use ($classroomId) {
                $query->where("id", $classroomId);
            })
            ->where('document_type', 'Paper')
            ->whereHas('subjects', function($query) use ($checked) {
                $query->whereIn("id", $checked);
            })
            ->orderBy('document_session', 'desc')
            ->paginate(12);
        }
        else if(FacadesRequest::get('year'))
        {
            $checked = $_GET['year'];

            $papers = Document::whereHas('classrooms', function($query) use ($classroomId) {
                $query->where("id", $classroomId);
            })
            ->where('document_type', 'Paper')
            ->whereIn(DB::raw('CAST(SUBSTR(document_session, 1, 4) AS integer)'), $checked)
            ->orderBy('document_session', 'desc')
            ->paginate(12);
        }
        else
        {
            $papers = Document::whereHas('classrooms', function($query) use ($classroomId) {
                $query->where("id", $classroomId);
            })
            ->where('document_type', 'Paper')
            ->orderBy('document_session', 'desc')
            ->paginate(12);
        }

        $subjects = Subject::orderBy('subject_name', 'asc')->get();

        return view('member.documents.papers.index', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('papers', 'subjects', 'years'));
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
    public function show(Document $paper)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->load('subjects');
        $paper->load('classrooms');



        $exams = Exam::all()->pluck('exam_name', 'id');

        return view('member.documents.papers.show', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('paper', 'exams'));
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
