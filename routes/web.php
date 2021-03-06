<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [\App\Http\Controllers\fontEnd\HomeController::class, 'index'])->name('home.index');
Route::post('/', [\App\Http\Controllers\fontEnd\HomeController::class, 'searchBook'])->name('home.search-books');
Route::get('/view-all', [\App\Http\Controllers\fontEnd\HomeController::class, 'viewAll'])->name('home.view-all');
Route::get('/{id}/book-detail', [\App\Http\Controllers\fontEnd\HomeController::class, 'bookDetail'])->name('home.book-detail');


//dang ki
Route::get('/login', [\App\Http\Controllers\fontEnd\HomeController::class, 'loginCustomer'])->name('home.login');
Route::get('/register', [\App\Http\Controllers\fontEnd\HomeController::class, 'showFormRegister'])->name('home.show-form-register');
Route::post('/login', [\App\Http\Controllers\fontEnd\HomeController::class, 'checkLogin'])->name('home.check-login');
Route::get('/logout', [\App\Http\Controllers\fontEnd\HomeController::class, 'logout'])->name('home.logout');
Route::post('/register', [\App\Http\Controllers\fontEnd\HomeController::class, 'register'])->name('home.register');


//cart
Route::prefix('/cart')->group(function (){
    Route::get('/{id}/add',[\App\Http\Controllers\fontEnd\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/show-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'showCart'])->name('cart.show');
    Route::get('/update-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/{id}/remove-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'removeProduct'])->name('cart.remove');
    Route::get('/delete-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'deleteCart'])->name('cart.delete');
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
    Route::prefix('/customers')->group(function (){
        Route::get('/',[CustomerController::class,'index'])->name('customers.index');

        Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit')
            ;

        Route::post('/{id}/edit',[CustomerController::class,'update'])->name('customers.update');

        Route::get('/{id}/delete',[CustomerController::class,'delete'])->name('customers.delete')
            ;
    });
//    });
});