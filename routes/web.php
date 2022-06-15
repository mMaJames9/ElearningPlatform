<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User Management
    Route::resource('/admin/usermanagement/users', 'App\Http\Controllers\UserController');
    Route::resource('/admin/usermanagement/roles', 'App\Http\Controllers\RoleController');

    // Paper Management
    Route::resource('/admin/papermanagement/exams', 'App\Http\Controllers\ExamController');
    Route::resource('/admin/papermanagement/subjects', 'App\Http\Controllers\SubjectController');
    Route::resource('/admin/papermanagement/documents', 'App\Http\Controllers\DocumentController');

    // Ressources
    Route::resource('/admin/ressources/transactions', 'App\Http\Controllers\TransactionController');
});
