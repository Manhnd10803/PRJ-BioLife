<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
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
        Route::get('/list', [AccountController::class, 'index'])->name('admin.account.list');
        Route::get('/add', [AccountController::class, 'getFormAdd'])->name('admin.account.add');
        Route::get('/edit', [AccountController::class, 'getFormEdit'])->name('admin.account.edit');
    });
    //Category Administration
    Route::prefix('category')->group(function(){
        Route::get('/list', function(){ return view('admin.category.list'); })->name('admin.category.list');
        Route::get('/add', function(){ return view('admin.category.add'); })->name('admin.category.add');
        Route::get('/edit', function(){ return view('admin.category.edit'); })->name('admin.category.edit');
    });
    //Bill Administration
    Route::prefix('bill')->group(function(){
        Route::get('/list', function(){ return view('admin.bill.list'); })->name('admin.bill.list');
        Route::get('/detailBill', function (){ return view('admin.bill.detailBill');})->name('admin.bill.detailBill');
        // Route::get('/add', function(){ return view('admin.bill.add'); })->name('admin.bill.add');
        // Route::get('/edit', function(){ return view('admin.bill.update'); })->name('admin.bill.edit');
        
    });
    //Product Administration
    Route::prefix('product')->group(function(){
        Route::get('/list', [ProductController::class, 'index'])->name('admin.product.list');
        Route::get('/add', [ProductController::class, 'getFormAdd'])->name('admin.product.add');
        Route::post('/add', [ProductController::class, 'submitFormAdd'])->name('admin.product.store');
        Route::get('/edit', [ProductController::class, 'getFormEdit'])->name('admin.product.edit');
        Route::post('/edit', [ProductController::class, 'submitFormEdit'])->name('admin.product.update');
    });
});

Route::get('/admin', function(){
    return view('admin.account.list');
});
// Route::get('/adminCategory', function(){
//     return view('admin.category.list');
// });
// Route::get('/formAddCategory', function(){
//     return view('admin.category.add');
// });
// Route::get('/formEditCategory', function(){
//     return view('admin.category.edit');
// });
// Route::get('/adminOrder', function(){
//     return view('admin.orders.list');
// });

