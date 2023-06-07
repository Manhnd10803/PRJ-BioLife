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

// Account
Route::get('/login', [AccountController::class, 'getFormLogin'])->name('login');
Route::get('/register', [AccountController::class, 'getFormRegister'])->name('register');
Route::get('/forgot-password', [AccountController::class, 'getFormForgotPassword']);