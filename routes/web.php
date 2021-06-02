<?php

use App\Http\Controllers\AdminLoginController;
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

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'checkLogin'])->name('admin.check-login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//    Route::middleware('checkLoginAdmin')->group(function () {

        Route::prefix('/users')->group(function () {
            Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.list')
                ;

            Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create')
                ;

            Route::post('/create', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');

            Route::get('/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')
                ;

            Route::post('/{id}/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

            Route::get('/{id}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete')
                ;
        });

    Route::prefix('/roles')->group(function () {
        Route::get('/', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles.list')
            ;
        Route::get('/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('roles.create')
            ;
        Route::post('/create', [\App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
        Route::get('/{id}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit')
            ;
        Route::post('/{id}/edit', [\App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
        Route::get('/{id}/delete', [\App\Http\Controllers\RoleController::class, 'delete'])->name('roles.delete')
            ;
    });

    Route::prefix('/permissions')->group(function () {
        Route::get('/', [\App\Http\Controllers\PermissionController::class, 'index'])
            ->name('permissions.list');
        Route::get('/create', [\App\Http\Controllers\PermissionController::class, 'create'])
            ->name('permissions.create');
        Route::post('/create', [\App\Http\Controllers\PermissionController::class, 'store'])
            ->name('permissions.store');
        Route::get('/{id}/edit', [\App\Http\Controllers\PermissionController::class, 'edit'])
            ->name('permissions.edit');
        Route::post('/{id}/edit', [\App\Http\Controllers\PermissionController::class, 'update'])
            ->name('permissions.update');
        Route::get('/{id}/delete', [\App\Http\Controllers\PermissionController::class, 'delete'])
            ->name('permissions.delete');
    });

        Route::prefix('authors')->group(function () {

            Route::get('/create', [\App\Http\Controllers\AuthorController::class, 'create'])->name('author.create');
            Route::post('/create', [\App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\AuthorController::class, 'edit'])->name('author.edit');
            Route::post('/{id}/update', [\App\Http\Controllers\AuthorController::class, 'update'])->name('author.update');
            Route::get('/{id}/destroy', [\App\Http\Controllers\AuthorController::class, 'delete'])->name('author.destroy');
            Route::post('/', [\App\Http\Controllers\AuthorController::class, 'search'])->name('author.search');
            Route::get('/', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author.list');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.list');
            Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
            Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/{id}/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
            Route::get('/{id}/destroy', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
            Route::post('/', [\App\Http\Controllers\CategoryController::class, 'search'])->name('category.search');
        });

        Route::prefix('book')->group(function () {
            Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('book.list');
            Route::get('/create', [\App\Http\Controllers\BookController::class, 'create'])->name('book.create');
            Route::post('/create', [\App\Http\Controllers\BookController::class, 'store'])->name('book.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
            Route::post('/{id}/update', [\App\Http\Controllers\BookController::class, 'update'])->name('book.update');
            Route::get('/{id}/destroy', [\App\Http\Controllers\BookController::class, 'delete'])->name('book.destroy');
            Route::post('/', [\App\Http\Controllers\BookController::class, 'search'])->name('book.search');
        });
//    });
});