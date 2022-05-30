<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ControllerExam extends Controller
{
    //
    public function index()
    {
        //

        $exam= Exam::all()->sortByDesc("created_at");

        return view('exam.index', compact('exam'));
    }


    public function create()
    {
        //
        $exam = Exam::all();
        $date = Carbon::now()->format('d-m-Y');

        $datac = array('date', 'exam');

        return view('exam.create', compact($datac) );
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'document_session' => ['required', 'string', 'max:255'],
            'exam_type' => ['required', 'string', 'min:9', ],
            'exam_name' => ['required', 'string', 'min:9', ],
            'exam_serie' => ['required', 'string', 'min:9', ],

        ]);

        $exam = Exam::create($request->all());

        $status = 'Nouvelle Examen ajouté avec succès';

        return redirect()->route('exam.index')->with([
            'status' => $status,
        ]);
    }



    public function show(Exam $exam)
    {
        //
    }

    public function edit()
    {
        //
        $exam = Exam::all();

        return view('exam.edit', compact('exam') );
    }

    public function update(Request $request, Exam $exam)
    {
        //
    }

    public function destroy($id)
    {

        DB::table('exams')->where('id', $id)->delete();


        $status = 'Cet examen a été supprimé avec succès';

        return redirect()->route('exam.index')->with([
            'status' => $status,
        ]);
    }

}
