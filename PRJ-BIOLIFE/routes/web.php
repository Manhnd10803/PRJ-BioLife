<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
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
    return view('index');
});
// Product
Route::get('/product-detail', function () {
    return view('products.productDetail');
});

// Account
Route::get('/login', [AccountController::class, 'getFormLogin'])->name('login');
Route::get('/register', [AccountController::class, 'getFormRegister'])->name('register');
Route::get('/forgot-password', [AccountController::class, 'getFormForgotPassword']);
// Cart
Route::get('/cart', function(){
    return view('cart.cart');
})->name('cart');
Route::get('/bill-success', function(){
    return view('cart.billSuccess');
});
Route::get('/check-out', function(){
    return view('cart.checkOut');
})->name('check-out');


//Admin
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){ return view('admin.dashboard'); })->name('admin.dashboard');
    //Account Administration
    Route::prefix('account')->group(function(){
        Route::get('/list', [AccountController::class, 'getFormList'])->name('admin.account.list');
        Route::get('/add', [AccountController::class, 'getFormAdd'])->name('admin.account.add');
        Route::get('/edit', [AccountController::class, 'getFormEdit'])->name('admin.account.edit');
    });
    //Category Administration
    Route::prefix('category')->group(function(){
        Route::get('/list', function(){ return view('admin.category.list'); })->name('admin.category.list');
        Route::get('/add', function(){ return view('admin.category.add'); })->name('admin.category.add');
        Route::get('/edit', function(){ return view('admin.category.update'); })->name('admin.category.edit');
    });
});