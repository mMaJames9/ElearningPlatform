<?php

use App\Models\Classroom;
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
    $classrooms = Classroom::all()->pluck('classroom_name', 'id');
    return view('welcome', compact('classrooms'));
})->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function() {

        Route::get('/dashboard', function () {

            return view('dashboard');

        })->name('dashboard');

        Route::get('/admin/ressources/subscriptions/subscriptionsDay', 'App\Http\Controllers\SubscriptionController@indexDay')->name('subscriptionsDay');
        Route::get('/admin/ressources/subscriptions/subscriptionsMonth', 'App\Http\Controllers\SubscriptionController@indexMonth')->name('subscriptionsMonth');
        Route::get('/admin/ressources/subscriptions/subscriptionsYear', 'App\Http\Controllers\SubscriptionController@indexYear')->name('subscriptionsYear');

        // User Management
        Route::resource('/admin/usermanagement/users', 'App\Http\Controllers\UserController');
        Route::resource('/admin/usermanagement/roles', 'App\Http\Controllers\RoleController', ['except' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

        // Paper Management
        Route::resource('/admin/exammanagement/exams', 'App\Http\Controllers\ExamController', ['except' => ['show']]);
        Route::resource('/admin/exammanagement/classrooms', 'App\Http\Controllers\ClassroomController', ['except' => ['show']]);
        Route::resource('/admin/exammanagement/subjects', 'App\Http\Controllers\SubjectController', ['except' => ['show']]);
        Route::resource('/admin/exammanagement/documents', 'App\Http\Controllers\DocumentController');

        // Ressources
        Route::resource('/admin/ressources/subscriptions', 'App\Http\Controllers\SubscriptionController', ['except' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

        // Plan
        Route::resource('user/plans', 'App\Http\Controllers\PlanController');

        // Member - Document Management
        Route::resource('/documents/books', 'App\Http\Controllers\BookController');
        Route::get("documents/books/{book}/download", "App\Http\Controllers\BookController@download")->name("downloadBook");

        Route::resource('/documents/papers', 'App\Http\Controllers\PaperController');
        Route::get("documents/papers/{paper}/download", "App\Http\Controllers\PaperController@download")->name("downloadPaper");

});
