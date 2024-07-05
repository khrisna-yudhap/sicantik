<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// API V1

//Auth
Route::post('/v1/users/login', [AuthController::class, 'loginUser']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Users API
    Route::get('/v1/users', [UserController::class, 'getAllUsers']);
    Route::get('/v1/users/{id}', [UserController::class, 'findUser']);
    Route::post('/v1/users', [UserController::class, 'registerUser']);
    Route::delete('/v1/users/{id}', [UserController::class, 'deleteUser']);
    Route::post('/v1/readlog', [UserController::class, 'postUserActivity']);

    // Get User Logged In Data
    Route::get('/v1/user-login', [AuthController::class, 'getUserLogin']);


    // Log Out / Revoke Token
    Route::get('/v1/logout', [AuthController::class, 'logoutUser']);

    // Modules API
    Route::get('/v1/modules', [ModuleController::class, 'getAllModules']);
    Route::get('/v1/modules/{id}', [ModuleController::class, 'viewModule']);

    // Quiz API
    Route::get('/v1/questions', [QuestionController::class, 'getAllQuestions']);
    Route::post('/v1/count/prescore', [ScoreController::class, 'countPreScore']);
    Route::post('/v1/count/postscore', [ScoreController::class, 'countPostScore']);
    Route::get('/v1/predone', [QuestionController::class, 'countPreDone']);
    Route::get('/v1/postdone', [QuestionController::class, 'countPostDone']);
});
