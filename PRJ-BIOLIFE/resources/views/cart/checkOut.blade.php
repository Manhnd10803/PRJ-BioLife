@extends('layouts.app')
@section('content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Check Out</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain checkout">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li class="step 1st">
                                    <div class="checkout-act active">
                                        <h3 class="title-box"><span class="number">.</span>Fill in the information</h3>
                                        <div class="box-content">
                                            <div class="login-on-checkout">
                                                <form action="#" name="frm-login" method="post">
                                                    <p class="form-row">
                                                        <label for="input_name">Full Name</label>
                                                        <input type="text" name="name" id="input_name" value="" placeholder="Your full name" style="width: 100%;">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_address">Address</label>
                                                        <input type="text" name="name" id="input_address" value="" placeholder="Your address" style="width: 100%;">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_phone">Phone number</label>
                                                        <input type="text" name="name" id="input_phone" value="" placeholder="Your phone number" style="width: 100%;">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Email</label>
                                                        <input type="text" name="name" id="input_email" value="" placeholder="Your email" style="width: 100%;">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="">Payment methods</label>
                                                        <div style="margin: 3%">
                                                            <div class="row">
                                                                <input type="radio" name="name" id="input_payment" value="1" checked>
                                                                <label for="input_payment">Payment on delivery</label>
                                                            </div>
                                                            <div class="row">
                                                                <input type="radio" name="name" id="input_payment" value="2">
                                                                <label for="input_payment">Online payment</label>
                                                            </div>
                                                        </div>
                                                    </p>
                                                    <p class="form-row">
                                                        <button type="submit" name="btn-sbmt" class="btn">Order now</button>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            {{-- <form action="" method="post">
                                <label for="">Full Name</label>
                                <input type="text" >
                            </form> --}}
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Order Summary</h3>
                                <a href="#" class="link-forward">Edit cart</a>
                            </div>
                            <div class="cart-list-box short-type">
                                <span class="number">2 items</span>
                                <ul class="cart-list">
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="{{ asset('storage/images/shippingcart/pr-01.jpg') }}" width="113" height="113" alt="shop-cart"></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="txt-quantity">1X</span>
                                                <a href="#" class="pr-name">National Fresh Fruit</a>
                                            </div>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="{{ asset('storage/images/shippingcart/pr-02.jpg') }}" width="113" height="113" alt="shop-cart" ></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="txt-quantity">1X</span>
                                                <a href="#" class="pr-name">National Fresh Fruit</a>
                                            </div>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">£170.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">£20.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tax</b>
                                            <span class="stt-price">£0.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">total:</b>
                                            <span class="stt-price">£190.00</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection