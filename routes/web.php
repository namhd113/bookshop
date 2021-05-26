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
Route::prefix('category')->group(function () {
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.list');
    Route::get('/create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('/create',[\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('/{id}/edit',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::post('/{id}/update',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    Route::get('/{id}/destroy',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destroy');
});

Route::prefix('book')->group(function () {
    Route::get('/',[\App\Http\Controllers\BookController::class,'index'])->name('book.list');
    Route::get('/create',[\App\Http\Controllers\BookController::class,'create'])->name('book.create');
    Route::post('/create',[\App\Http\Controllers\BookController::class,'store'])->name('book.store');
    Route::get('/{id}/edit',[\App\Http\Controllers\BookController::class,'edit'])->name('book.edit');
    Route::post('/{id}/update',[\App\Http\Controllers\BookController::class,'update'])->name('book.update');
    Route::get('/{id}/destroy',[\App\Http\Controllers\BookController::class,'delete'])->name('book.destroy');

});
