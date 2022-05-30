<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDocument extends Controller
{
    //

    public function index()
    {
        //

        $document= Document::all()->sortByDesc("created_at");

        return view('document.index', compact('document'));
    }


    public function create()
    {
        //
        $document = Document::all();
        $date = Carbon::now()->format('d-m-Y');

        $datac = array('date', 'Document');

        return view('document.create', compact($datac) );
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'document_title' => ['required', 'string', 'max:255', 'unique:users'],
            'document_type' => ['required', 'string', 'max:255', ],
            'document_price' => ['required', 'numeric', 'max:255', ],
            'document_path' => ['required', 'string', 'min:9', ],

        ]);

        $document = Document::create($request->all());

        $status = 'Nouveau  Document ajouté avec succès';

        return redirect()->route('document.index')->with([
            'status' => $status,
        ]);
    }



    public function show(Document $document)
    {
        //
    }

    public function edit()
    {
        //
        $document = Document::all();

        return view('document.edit', compact('document') );
    }

    public function update(Request $request, Document $document)
    {
        //
    }


    public function destroy($id)
    {

        DB::table('documents')->where('id', $id)->delete();


        $status = 'Ce document a été supprimé avec succès';

        return redirect()->route('document.index')->with([
            'status' => $status,
        ]);
    }





}
