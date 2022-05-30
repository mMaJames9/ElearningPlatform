<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ControllerUser extends Controller
{
    //
     //
     public function index()
     {
         //

         $user= User::all()->sortByDesc("created_at");

         return view('user.index', compact('user'));
     }


     public function create()
     {
         //
         $user = User::all();
         $date = Carbon::now()->format('d-m-Y');

         $datac = array('date', 'user');

         return view('user.create', compact($datac) );
     }


     public function store(Request $request)
     {
         $this->validate($request, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
             'password' => ['required', 'string', 'min:8', 'confirmed'],

         ]);

         $user = User::create($request->all());

         $status = 'Nouvelle itulisateur ajouté avec succès';

         return redirect()->route('user.index')->with([
             'status' => $status,
         ]);
     }



     public function show(User $user)
     {
         //
     }

     public function edit()
     {
         //
         $user = User::all();

         return view('user.edit', compact('user') );
     }

     public function update(Request $request, User $user)
     {
         //
     }

     public function destroy($id)
     {

         DB::table('user')->where('id', $id)->delete();


         $status = 'Cet itullisateur a été supprimé avec succès';

         return redirect()->route('user.index')->with([
             'status' => $status,
         ]);
     }
}
