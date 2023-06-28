@extends('layouts.app')
@section('javascript')
    <script>
        function validate(){
            let email = document.querySelector('#email').value;

            let error_email = document.querySelector('.error_email');

            let check = true;
            if(email == ''){
                error_email.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_email.innerHTML = '';
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
                    @isset($message_success)
                    <h3 class="text-success">{{ $message_success }}</h3>
                    @endisset
                    <div class="signin-container">
                        <form action="{{ route('forgot-password') }}" name="frm-login" method="post">
                            @csrf
                            @method('POST')
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="email" name="email" value="" class="txt-input">
                                <p class="text-danger error_email"></p>
                                @isset($message_fail)
                                <p class="text-danger">{{ $message_fail }}</p>
                                @endisset
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