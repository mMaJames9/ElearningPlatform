<?php

namespace App\Http\Controllers;

use App\Models\DocumentUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ControllerDocumentUser extends Controller
{
    //
     //
     public function index()
     {
         //

         $documentuser= DocumentUser::all()->sortByDesc("id");

         return view('documentuser.index', compact('documentuser'));
     }


     public function create()
     {
         //
         $documentuser = DocumentUser::all();


         return view('documentuser.create', compact($documentuser) );
     }


     public function store(Request $request)
     {

         $documentuser = DocumentUser::create($request->all());

         $status = 'Nouveau Document ajouté avec succès';

         return redirect()->route('documentuser.index')->with([
             'status' => $status,
         ]);
     }



     public function show(DocumentUser $documentuser)
     {
         //
     }

     public function edit()
     {
         //
         $documentuser = DocumentUser::all();

         return view('documentuser.edit', compact('documentuser') );
     }

     public function update(Request $request, DocumentUser $documentuser)
     {
         //
     }

     public function destroy($id)
     {

         DB::table('document_users')->where('id', $id)->delete();


         $status = 'Ce document a été supprimé avec succès';

         return redirect()->route('documentuser.index')->with([
             'status' => $status,
         ]);
     }
}
