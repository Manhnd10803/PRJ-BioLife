@extends('layouts.app')
@section('javascript')
    <script>
        function validate(){
            let password = document.querySelector('#password').value;
            let repeatPassword = document.querySelector('#repeatPassword').value;

            let error_password = document.querySelector('.error_password');
            let error_repeatPassword = document.querySelector('.error_repeatPassword');

            let check = true;
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
            <li class="nav-item"><span class="current-page">Forgot Password</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">

            <div class="row">

                <!--Form Forgot Password-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="{{ route('submit-new-password') }}" name="frm-login" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $id }}">
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
                                <button class="btn btn-submit btn-bold" type="submit" onclick="return validate()">Continue</button>
                            </p>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection