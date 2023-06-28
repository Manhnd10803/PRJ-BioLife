@extends('layouts.app')
@section('javascript')
    <script>
        function validate(){
            let email = document.querySelector('#email').value;
            let password = document.querySelector('#password').value;

            let error_email = document.querySelector('.error_email');
            let error_password = document.querySelector('.error_password');

            let check = true;
            if(email == ''){
                error_email.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_email.innerHTML = '';
            }
            if(password == ''){
                error_password.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_password.innerHTML = '';
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
            <li class="nav-item"><span class="current-page">Login</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">
            <div class="row">
                <!--Form Sign In-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    @isset($message_success)
                        <h3 class="text-success">{{ $message_success }}</h3>
                    @endisset
                    <div class="signin-container">
                        @isset($message_fail)
                            <h3 class="text-danger">{{ $message_fail }}</h3>
                        @endisset
                        <form action="{{ route('login') }}" name="frm-login" method="post">
                            @csrf
                            @method('POST')
                            <p class="form-row">
                                <label for="email">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="email" name="email" value="" class="txt-input">
                                <p class="text-danger error_email"></p>
                            </p>
                            <p class="form-row">
                                <label for="password">Password:<span class="requite">*</span></label>
                                <input type="password" id="password" name="password" value="" class="txt-input">
                                <p class="text-danger error_password"></p>
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" type="submit" onclick="return validate()">sign in</button>
                                <a href="forgot-password" class="link-to-help">Forgot your password</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!--Go to Register form-->
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
                            <a href="{{ route('register') }}" class="btn btn-bold">Create an account</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection