<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
Use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ControllerTransaction extends Controller
{
    //
     //
     public function index()
     {
         //

         $transaction= Transaction::all()->sortByDesc("created_at");

         return view('transaction.index', compact('transaction'));
     }


     public function create()
     {
         //
         $transaction = Transaction::all();
         $date = Carbon::now()->format('d-m-Y');

         $datac = array('date', 'exam');

         return view('transaction.create', compact($datac) );
     }


     public function store(Request $request)
     {

         $transaction = Transaction::create($request->all());

         return redirect()->route('transaction.index');
     }



     public function show(Transaction $transaction)
     {
         //
     }

     public function edit()
     {
         //
        //  $transaction = Transaction::all();

        //  return view('transaction.edit', compact('transaction') );
     }

     public function update(Request $request, Transaction $transaction)
     {
         //
     }

     public function destroy($id)
     {

        //  DB::table('exams')->where('id', $id)->delete();

        //  return redirect()->route('transaction.index')
}

}
