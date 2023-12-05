<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('auth.login')->middleware('guest');
    Route::get('/register', 'registerPage')->name('auth.register')->middleware('guest');

    Route::post('/auth/register', 'register')->name('auth.register');
    Route::post('/auth/login', 'login')->name('auth.login');
    Route::post('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(QuestionController::class)->prefix('questions')->group(function () {
    Route::get('/', 'index')->name('question.index');
    Route::get('/create', 'create')->name('question.create');
    Route::get('/{id}/edit', 'edit')->name('question.edit');
    Route::get('/{id}', 'detail')->name('question.detail');

    Route::post('/store', 'store')->name('question.store');
    Route::put('/{id}/update', 'update')->name('question.update');
    Route::delete('/{id}/delete', 'delete')->name('question.delete');
});

Route::controller(AnswerController::class)->prefix('answers')->group(function () {
    Route::get('/create/{questionId}', 'create')->name('answer.create');

    Route::post('/store', 'store')->name('answer.store');
});
