@extends('layouts.app')
@section('javascript')
    <script>
        function validate(){
            let fullname = document.querySelector('#fullname').value;
            let email = document.querySelector('#email').value;
            let username = document.querySelector('#username').value;
            let password = document.querySelector('#password').value;
            let repeatPassword = document.querySelector('#repeatPassword').value;

            let error_fullname = document.querySelector('.error_fullname');
            let error_email = document.querySelector('.error_email');
            let error_username = document.querySelector('.error_username');
            let error_password = document.querySelector('.error_password');
            let error_repeatPassword = document.querySelector('.error_repeatPassword');

            let check = true;
            if(fullname == ''){
                error_fullname.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_fullname.innerHTML = '';
            }
            if(email == ''){
                error_email.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_email.innerHTML = '';
            }
            if(username == ''){
                error_username.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_username.innerHTML = '';
            }
            if(password == ''){
                error_password.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_password.innerHTML = '';
            }
            if(repeatPassword == ''){
                error_repeatPassword.innerHTML = "You can't leave it blank";
                check = false;
            }else if(repeatPassword !== password){
                error_repeatPassword.innerHTML = "Re-entered password does not match";
                check = false;
            }else{
                error_repeatPassword.innerHTML = '';
            }
            return check;
        }
    </script>
@endsection
@section('content')
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Register</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">
            @error('email')
                <h3 class="text-danger">{{ $message }}</h3>
            @enderror
            <div class="row">
                <!--Form Sign Up-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="{{ route('register') }}" name="frm-login" method="post">
                            @csrf
                            @method('POST')
                            <p class="form-row">
                                <label for="fullname">Full Name:<span class="requite">*</span></label>
                                <input type="text" id="fullname" name="fullname" value="" class="txt-input">
                                <p class="text-danger error_fullname"></p>
                            </p>
                            <p class="form-row">
                                <label for="email">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="email" name="email" value="" class="txt-input">
                                <p class="text-danger error_email"></p>
                            </p>
                            <p class="form-row">
                                <label for="username">Username:<span class="requite">*</span></label>
                                <input type="text" id="username" name="username" value="" class="txt-input">
                                <p class="text-danger error_username"></p>
                            </p>
                            <p class="form-row">
                                <label for="password">Password:<span class="requite">*</span></label>
                                <input type="password" id="password" name="password" value="" class="txt-input">
                                <p class="text-danger error_password"></p>
                            </p>
                            <p class="form-row">
                                <label for="repeatPassword">Repeat Password:<span class="requite">*</span></label>
                                <input type="password" id="repeatPassword" name="repeatPassword" value="" class="txt-input">
                                <p class="text-danger error_repeatPassword"></p>
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" type="submit" onclick="return validate()">sign up</button>
                            </p>
                        </form>
                    </div>
                </div>

                <!--New customer benefits-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">New Customer?</h4>
                            <p class="sub-title">Create an account with us and you’ll be able to:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection