<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'isAdmin'], function(){


Route::get('/user/register', [UserController::class, 'show']);
Route::post('/user/create', [UserController::class, 'store']);

Route::post('/user/logout', [UserController::class, 'logout']);
Route::get('/', [UserController::class, 'index']);
Route::get('/user/alluser', [UserController::class, 'alluser']);
Route::get('/user/show/{id}', [UserController::class, 'showuser']);
Route::put('/user/update/{user}', [UserController::class, 'update']);
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy']);
Route::get('/quiz/show', [QuizController::class, 'create']);
Route::post('/quiz/store', [QuizController::class, 'store']);
Route::get('/quiz/index' ,[QuizController::class, 'index']);
Route::get('/quiz/show/{quiz}', [QuizController::class, 'show']);
Route::put('/quiz/edit/{quiz}', [QuizController::class, 'edit']);
Route::delete('/quiz/delete/{quiz}', [QuizController::class, 'destroy']);
Route::get('/quiz/question/{quiz}', [QuizController::class, 'question']);

Route::get('/question/create', [QuestionController::class, 'create']);
Route::post('/question/store', [QuestionController::class, 'store']);
Route::get('/question/index', [QuestionController::class, 'index']);
Route::get('/question/show/{question}', [QuestionController::class, 'show']);
Route::get('/question/edit/{question}', [QuestionController::class, 'edit']);
Route::put('/question/update/{question}',[QuestionController::class, 'update']);
Route::delete('/question/delete/{question}', [QuestionController::class, 'destroy']);

});
Route::get('/user/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/auth', [UserController::class, 'authenticate']);

