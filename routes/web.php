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

// Route::redirect('/', 'login');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function() {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/admin/ressources/transactions/transactionsDay', 'App\Http\Controllers\TransactionController@indexDay')->name('transactionsDay');
        Route::get('/admin/ressources/transactions/transactionsMonth', 'App\Http\Controllers\TransactionController@indexMonth')->name('transactionsMonth');
        Route::get('/admin/ressources/transactions/transactionsYear', 'App\Http\Controllers\TransactionController@indexYear')->name('transactionsYear');

        // User Management
        Route::resource('/admin/usermanagement/users', 'App\Http\Controllers\UserController');
        Route::resource('/admin/usermanagement/roles', 'App\Http\Controllers\RoleController');

        // Paper Management
        Route::resource('/admin/exammanagement/exams', 'App\Http\Controllers\ExamController');
        Route::resource('/admin/exammanagement/classrooms', 'App\Http\Controllers\ClassroomController');
        Route::resource('/admin/exammanagement/subjects', 'App\Http\Controllers\SubjectController');
        Route::resource('/admin/exammanagement/documents', 'App\Http\Controllers\DocumentController');

        // Ressources
        Route::resource('/admin/ressources/transactions', 'App\Http\Controllers\TransactionController');

});
