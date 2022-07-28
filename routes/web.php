<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;

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
    return view('layouts/inc/frontend/home');
});

Auth::routes();
Route::post('/add-to-cart', [CartController::class, 'addProduct']);
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart'])->name('cart');
    Route::get('checkout', [CheckoutController::class, 'index']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'login']);
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('category/{category_id}', 'update');
        Route::post('category/delete', 'destroy');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index');
        Route::get('/product/create', 'create');
        Route::post('/product', 'store');
        Route::get('/product/{product}/edit', 'edit');
        Route::put('product/{product_id}', 'update');
        Route::post('product/delete', 'destroy');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/create', 'create');
        Route::post('/user', 'store');
        Route::get('/user/{user}/edit', 'edit');
        Route::post('/user/update', 'update');
        Route::post('/user/delete', 'destroy');
    });
});
