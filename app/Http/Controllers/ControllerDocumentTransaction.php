<?php

namespace App\Http\Controllers;
use App\Models\DocumentTransaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ControllerDocumentTransaction extends Controller
{
    //
     //
     public function index()
     {
         //

         $documenttransaction= DocumentTransaction::all()->sortByDesc("id");

         return view('exam.index', compact('exam'));
     }


     public function create()
     {
         //
         $documenttransaction = DocumentTransaction::all();

         return view('documenttransaction.create', compact($documenttransaction) );
     }


     public function store(Request $request)
     {

         $documenttransaction = DocumentTransaction::create($request->all());
         return redirect()->route('documenttransaction.index');
     }



     public function show(DocumentTransaction $documenttransaction)
     {
         //
     }

     public function edit()
     {
         //
         $documenttransaction = DocumentTransaction::all();

         return view('documenttransaction.edit', compact('documenttransaction') );
     }

     public function update(Request $request, DocumentTransaction $documenttransaction)
     {
         //
     }

     public function destroy($id)
     {

         DB::table('document_transaction')->where('id', $id)->delete();

         return redirect()->route('documenttransaction.index');
     }
}
