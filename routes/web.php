<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/view/{id}', [UserController::class, 'view'])->name('detailUser');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/delete/{id}', [UserController::class, 'delUser'])->name('deleteUser');

    Route::get('/modules', [ModuleController::class, 'index'])->name('modules');
    Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/view/{id}', [ModuleController::class, 'view'])->name('modules.view');
    Route::get('/modules/delete/{id}', [ModuleController::class, 'delete'])->name('modules.delete');
    Route::get('/modules/printout', [ModuleController::class, 'print_out'])->name('modules.print');

    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/manage-question/{id}', [QuestionController::class, 'question_setting'])->name('questions.setting');
    Route::get('/questions/set-answer-key/{id}', [QuestionController::class, 'set_key'])->name('questions.set_key');

    Route::post('/answers/store', [AnswerController::class, 'store'])->name('answers.store');
    Route::post('/answers/update', [AnswerController::class, 'update'])->name('answers.update');
});
