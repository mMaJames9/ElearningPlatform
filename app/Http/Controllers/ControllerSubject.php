<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ControllerSubject extends Controller
{
    //
     //
     public function index()
     {
         //

         $subject= Subject::all()->sortByDesc("created_at");

         return view('subject.index', compact('subject'));
     }


     public function create()
     {
         //
         $subject = Subject::all();
         $date = Carbon::now()->format('d-m-Y');

         $datac = array('date', 'subject');

         return view('subject.create', compact($datac) );
     }


     public function store(Request $request)
     {
         $this->validate($request, [
             'subject_name' => ['required', 'string', 'min:9', ],

         ]);

         $subject = Subject::create($request->all());

         $status = 'Nouvelle mattier ajouté avec succès';

         return redirect()->route('subject.index')->with([
             'status' => $status,
         ]);
     }



     public function show(Subject $subject)
     {
         //
     }

     public function edit()
     {
         //
         $subject = Subject::all();

         return view('subject.edit', compact('subject') );
     }

     public function update(Request $request, Subject $subject)
     {
         //
     }

     public function destroy($id)
     {

         DB::table('subjects')->where('id', $id)->delete();


         $status = 'Cette mattier a été supprimé avec succès';

         return redirect()->route('subject.index')->with([
             'status' => $status,
         ]);
     }
}
