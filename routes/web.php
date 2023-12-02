<?php

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

Route::controller(QuestionController::class)->prefix('questions')->group(function () {
    Route::get('/', 'index')->name('question.index');
    Route::get('/create', 'create')->name('question.create');
    Route::get('/{id}/edit', 'edit')->name('question.edit');
    Route::get('/{id}', 'detail')->name('question.detail');

    Route::post('/store', 'store')->name('question.store');
    Route::put('/{id}/update', 'update')->name('question.update');
    Route::delete('/{id}/delete', 'delete')->name('question.delete');
});
