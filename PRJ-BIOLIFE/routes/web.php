<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

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

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');
// Product
Route::get('/product', [HomeController::class, 'productList'])->name('productList');
Route::get('/product-detail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');
Route::get('/product-by-category/{id}', [HomeController::class, 'productCategory'])->name('productCategory');
Route::get('/product-search', [HomeController::class, 'productSearch'])->name('productSearch');
// Account
Route::get('/login', [AccountController::class, 'getFormLogin'])->name('login');
Route::post('/login', [AccountController::class, 'submitFormLogin'])->name('login');
Route::get('/register', [AccountController::class, 'getFormRegister'])->name('register');
Route::post('/register', [AccountController::class, 'submitFormRegister'])->name('register');
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AccountController::class, 'getFormForgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [AccountController::class, 'submitFormForgotPassword'])->name('forgot-password');
Route::get('/new-password/{id}/{token}', [AccountController::class, 'getFormNewPassword'])->name('new-password');
Route::post('/new-password', [AccountController::class, 'submitFormNewPassword'])->name('submit-new-password');
// Cart
Route::get('/add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');
Route::get('/view-cart', [OrderController::class, 'viewCart'])->name('viewCart');
Route::get('/check-out', [OrderController::class, 'checkOut'])->name('checkOut');
Route::post('/check-out', [OrderController::class, 'submitCheckOut'])->name('checkOut');
Route::post('/update-quantity-in-cart', [OrderController::class, 'updateQuantityInCart'])->name('updateCart');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'ManagerLogin'] ,function(){
    Route::get('/dashboard', function(){ return view('admin.dashboard'); })->name('admin.dashboard');
    //Account Administration
    Route::prefix('account')->group(function(){
        Route::get('/list', [AccountController::class, 'index'])->name('admin.account.list');
        Route::get('/add', [AccountController::class, 'getFormAdd'])->name('admin.account.add');
        Route::post('/add', [AccountController::class, 'submitFormAdd'])->name('admin.account.store');
        Route::get('/edit/{id}', [AccountController::class, 'getFormEdit'])->name('admin.account.edit');
        Route::put('/edit/{id}', [AccountController::class, 'submitFormEdit'])->name('admin.account.update');
        Route::get('/delete/{id}', [AccountController::class, 'deleteUser'])->name('admin.account.delete');
    });
    //Category Administration
    Route::prefix('category')->group(function(){
        Route::get('/list', [CategoryController::class,'index'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class,'getFormAdd'])->name('admin.category.add');
        Route::post('/add', [CategoryController::class,'submitFormAdd'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class,'getFormEdit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class,'submitFormEdit'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'softDelete'])->name('admin.category.delete');
    });
    //Bill Administration
    Route::prefix('bill')->group(function(){
        Route::get('/list', [BillController::class,'index'])->name('admin.bill.list');
        Route::get('/detailBill/{id}', [BillController::class, 'getFormDetail'])->name('admin.bill.detailBill');
        Route::post('/detailBill/{id}', [BillController::class, 'submitFormDetail'])->name('admin.bill.update');
        // Route::get('/add', function(){ return view('admin.bill.add'); })->name('admin.bill.add');
        // Route::get('/edit', function(){ return view('admin.bill.update'); })->name('admin.bill.edit');
        
    });
    //Product Administration
    Route::prefix('product')->group(function(){
        Route::get('/list', [ProductController::class, 'index'])->name('admin.product.list');
        Route::get('/add', [ProductController::class, 'getFormAdd'])->name('admin.product.add');
        Route::post('/add', [ProductController::class, 'submitFormAdd'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'getFormEdit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'submitFormEdit'])->name('admin.product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'softDelete'])->name('admin.product.delete');
    });
});
