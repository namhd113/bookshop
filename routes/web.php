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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('authors')->group(function () {
    Route::get('/',[\App\Http\Controllers\AuthorController::class,'index'])->name('author.list');
    Route::get('/create',[\App\Http\Controllers\AuthorController::class,'create'])->name('author.create');
    Route::post('/create',[\App\Http\Controllers\AuthorController::class,'store'])->name('author.store');
    Route::get('/{id}/edit',[\App\Http\Controllers\AuthorController::class,'edit'])->name('author.edit');
    Route::post('/{id}/update',[\App\Http\Controllers\AuthorController::class,'update'])->name('author.update');
    Route::get('/{id}/destroy',[\App\Http\Controllers\AuthorController::class,'delete'])->name('author.destroy');
});
