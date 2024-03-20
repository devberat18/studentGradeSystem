<?php
use \App\Http\Controllers\StudentController;
use \App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::middleware(['auth'])->group(function () {
    Route::view('/admin', 'admin.home');
    Route::group(['prefix' => 'student'], function () {
        Route::get('', [StudentController::class, 'index']);
        Route::get('add', [StudentController::class, 'add']);
        Route::post('add', [StudentController::class, 'create']);
        Route::get('edit/{id}', [StudentController::class, 'edit']);
        Route::patch('edit/{id}', [StudentController::class, 'update']);
        Route::get('delete/{id}', [StudentController::class, 'delete']);
    });

    Route::group(['prefix' => 'course'], function () {
        Route::get('', [CourseController::class, 'index']);
        Route::get('add', [CourseController::class, 'add']);
        Route::post('add', [CourseController::class, 'create']);
        Route::get('edit/{id}', [CourseController::class, 'edit']);
        Route::patch('edit/{id}', [CourseController::class, 'update']);
        Route::get('delete/{id}', [CourseController::class, 'delete']);
    });

});
