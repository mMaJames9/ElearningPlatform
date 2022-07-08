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

Route::redirect('/', 'login');

// Route::get('/', function () {
//     $classrooms = Classroom::all()->pluck('classroom_name', 'id');
//     return view('welcome', compact('classrooms'));
// })->name('welcome');

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
        Route::resource('/admin/usermanagement/roles', 'App\Http\Controllers\RoleController');

        // Paper Management
        Route::resource('/admin/exammanagement/exams', 'App\Http\Controllers\ExamController');
        Route::resource('/admin/exammanagement/classrooms', 'App\Http\Controllers\ClassroomController');
        Route::resource('/admin/exammanagement/subjects', 'App\Http\Controllers\SubjectController');
        Route::resource('/admin/exammanagement/documents', 'App\Http\Controllers\DocumentController');

        // Ressources
        Route::resource('/admin/ressources/subscriptions', 'App\Http\Controllers\SubscriptionController');

});
