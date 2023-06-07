<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getFormLogin(){
        return view('account.login');
    }
    public function getFormRegister(){
        return view('account.register');
    }
    public function getFormForgotPassword(){
        return view('account.forgotPassword');
    }
}
