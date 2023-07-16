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
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        @if (isset($message))
                            <h3>{{ $message }}</h3>
                        @else
                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <h3 class="box-title">Your cart items</h3>
                                <form class="shopping-cart-form" action="{{ route('updateCart') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <table class="shop_table cart-form">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $item)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113" src="{{ asset('storage/'.$item->srcImage) }}" alt="shipping cart"></figure>
                                                </a>
                                                <a class="prd-name" href="{{ route('productDetail', $item->idProduct) }}">{{ $item->nameProduct }}</a>
                                                <div class="action">
                                                    <a class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="{{ route('deleteAProductInCart', $item->idProduct) }}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">$</span>{{ $item->priceSaleProduct }}</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">$</span>{{ $item->priceProduct }}</span></del>
                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity-box type1">
                                                    <div class="qty-input">
                                                        <input type="text" name="{{ $i }}" value="{{ $item->qtyInCart }}" data-max_value="20" data-min_value="1" data-step="1">
                                                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">$</span>{{ $item->total }}</span></ins>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                        <tr class="cart_item wrap-buttons">
                                            <td class="wrap-btn-control" colspan="4">
                                                <a class="btn back-to-shop" href="{{ route('productList') }}">Back to Shop</a>
                                                <button class="btn btn-update" type="submit">update</button>
                                                <a href="{{ route('deleteAllProductInCart') }}" class="btn btn-clear">clear all</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="shpcart-subtotal-block">
                                    <div class="subtotal-line">
                                        <b class="stt-name">Subtotal <span class="sub">{{ count(Session::get('cart')) }} items</span></b>
                                        <span class="stt-price">${{ $billTotal }}</span>
                                    </div>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price">$2</span>
                                    </div>
                                    <div class="tax-fee">
                                        <p class="title">Est. Taxes & Fees</p>
                                        <p class="desc">Based on 56789</p>
                                    </div>
                                    <div class="btn-checkout">
                                        <a href="{{ route('checkOut') }}" class="btn checkout">Check out</a>
                                    </div>
                                    {{-- <div class="biolife-progress-bar">
                                        <table>
                                            <tr>
                                                <td class="first-position">
                                                    <span class="index">$0</span>
                                                </td>
                                                <td class="mid-position">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="last-position">
                                                    <span class="index">$99</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div> --}}
                                    <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!--Related Product-->
                <div class="product-related-box single-layout">
                    {{-- <div class="biolife-title-box lg-margin-bottom-26px-im">
                        <span class="biolife-icon icon-organic"></span>
                        <span class="subtitle">All the best item for You</span>
                        <h3 class="main-title">Related Products</h3>
                    </div>
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-13.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-14.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-15.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-10.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-08.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-21.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">Fresh Fruit</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>

            </div>
        </div>
    </div>
@endsection