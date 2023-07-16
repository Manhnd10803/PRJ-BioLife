@extends('layouts.app')
@section('javascript')
    <script>
        function validate(){
            let fullname = document.querySelector('#input_name').value;
            let address = document.querySelector('#input_address').value;
            let phone = document.querySelector('#input_phone').value;
            // let email = document.querySelector('#input_email').value;
            
            let error_name = document.querySelector('.error_name');
            let error_address = document.querySelector('.error_address');
            let error_phone = document.querySelector('.error_phone');
            // let error_email = document.querySelector('.error_email');

            let check = true;
            if(fullname == ''){
                error_name.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_name.innerHTML = "";
            }
            if(address == ''){
                error_address.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_address.innerHTML = "";
            }
            if(phone == ''){
                error_phone.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_phone.innerHTML = "";
            }
            // if(email == ''){
            //     error_email.innerHTML = "You can't leave it blank";
            //     check = false;
            // }else{
            //     error_email.innerHTML = "";
            // }
            return check;
        }
    </script>
@endsection
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
                                                <form action="{{ route('checkOut') }}" name="frm-login" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="billTotal" value="{{ $billTotal + 2 + $billTotal*3.1/100}}">
                                                    <p class="form-row">
                                                        <label for="input_name">Full Name</label>
                                                        <input type="text" name="name" id="input_name" value="@php if(Auth::check()){ echo Auth::user()->fullname;} @endphp" placeholder="Your full name" style="width: 100%;">
                                                        <p class="text-danger error_name"></p>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_address">Address</label>
                                                        <input type="text" name="address" id="input_address" value="@php if(Auth::check()){echo Auth::user()->address;} @endphp" placeholder="Your address" style="width: 100%;">
                                                        <p class="text-danger error_address"></p>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_phone">Phone number</label>
                                                        <input type="text" name="phone" id="input_phone" value="@php if(Auth::check()){echo Auth::user()->phone;} @endphp" placeholder="Your phone number" style="width: 100%;">
                                                        <p class="text-danger error_phone"></p>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Email</label>
                                                        <input type="text" name="email" id="input_email" value="@php if(Auth::check()){echo Auth::user()->email;} @endphp" placeholder="Your email" style="width: 100%;">
                                                        {{-- <p class="text-danger error_email"></p> --}}
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="">Payment methods</label>
                                                        <div style="margin: 3%">
                                                            <div class="row">
                                                                <input type="radio" name="payment" id="input_payment" value="1" checked>
                                                                <label for="input_payment">Payment on delivery</label>
                                                            </div>
                                                            <div class="row">
                                                                <input type="radio" name="payment" id="input_payment" value="2">
                                                                <label for="input_payment">Online payment</label>
                                                            </div>
                                                        </div>
                                                    </p>
                                                    <p class="form-row">
                                                        <button type="submit" class="btn" onclick="return validate()">Order now</button>
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
                                <a href="{{ route('viewCart') }}" class="link-forward">Edit cart</a>
                            </div>
                            <div class="cart-list-box short-type">
                                <span class="number">{{ count(Session::get('cart')) }} items</span>
                                <ul class="cart-list">
                                    @foreach (Session::get('cart') as $item)
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="{{ asset('storage/'.$item->srcImage) }}" width="113" height="113" alt="shop-cart"></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="txt-quantity">{{ $item->qtyInCart }}X</span>
                                                <a href="#" class="pr-name">National Fresh Fruit</a>
                                            </div>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">$</span>{{ $item->total }}</span></ins>
                                                {{-- <del><span class="price-amount"><span class="currencySymbol">$</span>{{ $item->priceProduct }}</span></del> --}}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">${{ $billTotal }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">$2</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tax</b>
                                            <span class="stt-price">${{ $billTotal * 3.1/100 }}</span>
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
                                            <span class="stt-price">${{ $billTotal + 2 + $billTotal*3.1/100}}</span>
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