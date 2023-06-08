@extends('layouts.app')
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
            <div class="row">
                <!--Form Sign Up-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="#" name="frm-login" method="post">
                            <p class="form-row">
                                <label for="fid-fillname">Full Name:<span class="requite">*</span></label>
                                <input type="text" id="fid-fillname" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="fid-username">Username:<span class="requite">*</span></label>
                                <input type="email" id="fid-username" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="password" id="fid-pass" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="fid-repass">Repeat Password:<span class="requite">*</span></label>
                                <input type="password" id="fid-repass" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" type="submit">sign up</button>
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