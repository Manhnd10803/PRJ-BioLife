@extends('layouts.app')
@section('content')
    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">
                        <div class="block-title">
                            <span class="menu-icon">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                            <span class="menu-title">All departments</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            <ul class="menu clone-main-menu">
                                @foreach ($categories as $category)
                                <li class="menu-item"><a href="{{ route('productCategory', $category->idCategory) }}" class="menu-title"><i class="{{ $category->iconCategory }}"></i>{{ $category->nameCategory }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
                    <div class="header-search-bar layout-01">
                        <form action="{{ route('productSearch') }}" class="form-search" name="desktop-seacrh" method="get">
                            <input type="text" name="kyw" class="input-text" value="" placeholder="Search here...">
                            <select name="category">
                                <option value="-1" selected>All Categories</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->idCategory }}">{{ $category->nameCategory }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                        </form>
                    </div>
                    <div class="live-info">
                        <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                        <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <!--Block 01: Main slide-->
            <div class="main-slide block-slider">
                <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
                    {{-- @foreach ($productsBanner as $productBanner)
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt">
                                    <a href="#" class="link-to">
                                        <img src="{{ asset('storage/'.$productBanner->srcImage) }}" width="604" height="580" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach --}}
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt">
                                    <a href="#" class="link-to">
                                        <img src="{{ asset('storage/images/home-03/slide-01-child-01.png') }}" width="604" height="580" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt"><a href="#" class="link-to"><img src="{{ asset('storage/images/home-03/slide-01-child-01.png') }}" width="604" height="580" alt=""></a></div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!--Block 02: Banner-->
            {{-- <div class="special-slide">
                <div class="container">
                    <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}' >
                        <li>
                            <div class="slide-contain biolife-banner__special">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link">
                                            <figure><img src="{{ asset('storage/images/home-03/bn_special_org.jpg') }}" width="616" height="483" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <b class="first-line">Pomegranate</b>
                                        <span class="second-line">Organic Heaven Made</span>
                                        <span class="third-line">Easy <i>Healthy, Happy Life</i></span>
                                        <div class="product-detail">
                                            <h4 class="product-name">National Fresh Fruit Production</h4>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-contain biolife-banner__special">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link">
                                            <figure><img src="{{ asset('storage/images/home-03/bn_special_org.jpg') }}" width="616" height="483" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <b class="first-line">Pomegranate</b>
                                        <span class="second-line">Organic Heaven Made</span>
                                        <span class="third-line">Easy <i>Healthy, Happy Life</i></span>
                                        <div class="product-detail">
                                            <h4 class="product-name">National Fresh Fruit Production</h4>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-contain biolife-banner__special">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link">
                                            <figure><img src="{{ asset('storage/images/home-03/bn_special_org.jpg') }}" width="616" height="483" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <b class="first-line">Pomegranate</b>
                                        <span class="second-line">Organic Heaven Made</span>
                                        <span class="third-line">Easy <i>Healthy, Happy Life</i></span>
                                        <div class="product-detail">
                                            <h4 class="product-name">National Fresh Fruit Production</h4>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-contain biolife-banner__special">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link">
                                            <figure><img src="{{ asset('storage/images/home-03/bn_special_org.jpg') }}" width="616" height="483" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="text-content">
                                        <b class="first-line">Pomegranate</b>
                                        <span class="second-line">Organic Heaven Made</span>
                                        <span class="third-line">Easy <i>Healthy, Happy Life</i></span>
                                        <div class="product-detail">
                                            <h4 class="product-name">National Fresh Fruit Production</h4>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
                        <b class="txt-show-01">100%Nature</b>
                        <i class="txt-show-02">Fresh Fruits</i>
                        <ul class="services-list">
                            <li>
                                <div class="service-inner">
                                    <span class="number">1</span>
                                    <span class="biolife-icon icon-beer"></span>
                                    <a class="srv-name" href="#">full stamped product</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">2</span>
                                    <span class="biolife-icon icon-schedule"></span>
                                    <a class="srv-name" href="#">place and delivery on time</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">3</span>
                                    <span class="biolife-icon icon-car"></span>
                                    <a class="srv-name" href="#">Free shipping in the city</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            <!--Block 03: Product Tab-->
            <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
                <div class="container">
                    <div class="biolife-title-box">
                        <span class="subtitle">All the best item for You</span>
                        <h3 class="main-title">Related Products</h3>
                    </div>
                    <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                        <div class="tab-head tab-head__icon-top-layout icon-top-layout">
                            <ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
                                <li class="tab-element active">
                                    <a href="#tab01_1st" class="tab-link"><span class="biolife-icon icon-lemon"></span>Oranges</a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_2nd" class="tab-link"><span class="biolife-icon icon-grape2"></span>Grapes</a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_3rd" class="tab-link"><span class="biolife-icon icon-blueberry"></span>Blueberries</a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_4th" class="tab-link"><span class="biolife-icon icon-orange"></span>Lemon</a>
                                </li>
                                <li class="tab-element" >
                                    <a href="#tab01_5th" class="tab-link"><span class="biolife-icon icon-broccoli"></span>Vegetables</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="tab01_1st" class="tab-contain active">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-07.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                </ul>
                            </div>
                            <div id="tab01_2nd" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-07.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
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

                                </ul>
                            </div>
                            <div id="tab01_3rd" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-07.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
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

                                </ul>
                            </div>
                            <div id="tab01_4th" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-07.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
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
                                </ul>
                            </div>
                            <div id="tab01_5th" class="tab-contain ">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado, Large</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers Magnetic Salt</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-07.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">13 Healing Powers of Lemons</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower Kugel</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
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
                                                    <img src="{{ asset('storage/images/products/p-18.jpg') }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 04: Banner Promotion 01 -->
            <div class="banner-promotion-01 xs-margin-top-50px sm-margin-top-11px">
                <div class="biolife-banner promotion biolife-banner__promotion">
                    <div class="banner-contain">
                        <div class="media background-biolife-banner__promotion">
                            <div class="img-moving position-1">
                                <img src="{{ asset('storage/images/home-03/img-moving-pst-1.png') }}" width="149" height="139" alt="img msv">
                            </div>
                            <div class="img-moving position-2">
                                <img src="{{ asset('storage/images/home-03/img-moving-pst-2.png') }}" width="185" height="265" alt="img msv">
                            </div>
                            <div class="img-moving position-3">
                                <img src="{{ asset('storage/images/home-03/img-moving-pst-3-cut.png') }}" width="384" height="151" alt="img msv">
                            </div>
                            <div class="img-moving position-4">
                                <img src="{{ asset('storage/images/home-03/img-moving-pst-4.png') }}" width="198" height="269" alt="img msv">
                            </div>
                        </div>
                        <div class="text-content">
                            <div class="container text-wrap">
                                <i class="first-line">Healthy Fruit juice</i>
                                <span class="second-line">Vegetable Always fresh</span>
                                <p class="third-line">Food Heaven Made Easy sounds like the name of an amazingly delicious food delivery service, but don't be fooled...</p>
                                <div class="product-detail">
                                    <p class="txt-price"><span>Only:</span>$8.00</p>
                                    <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 05: Banner Promotion 02-->
            <div class="banner-promotion-02 z-index-20">
                <div class="biolife-banner promotion2 biolife-banner__promotion2">
                    <div class="banner-contain">
                        <div class="container">
                            <div class="media"></div>
                            <div class="text-content">
                                <b class="first-line">Food Heaven Made</b>
                                <span class="second-line">Easy <i>Healthy, Happy Life</i></span>
                                <p class="third-line">Food Heaven Made Easy sounds like the name of an amazingly delicious food delivery service, but don't be fooled. The blog is actually a compilation of recipes, cooking videos, and nutrition tips.</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Read More</a>
                                    <a href="#" class="btn btn-thin">View Menu Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 06: Products-->
            <div class="Product-box sm-margin-top-96px xs-margin-top-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <div class="advance-product-box">
                                <div class="biolife-title-box bold-style biolife-title-box__bold-style">
                                    <h3 class="title">Deals of the day</h3>
                                </div>
                                <ul class="products biolife-carousel nav-top-right nav-none-on-mobile" data-slick='{"arrows":true, "dots":false, "infinite":false, "speed":400, "slidesMargin":30, "slidesToShow":1}'>
                                    <li class="product-item">
                                        <div class="contain-product deal-layout contain-product__deal-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/home-03/product_deal_330x330.jpg') }}" alt="dd" width="330" height="330" class="product-thumnail">
                                                </a>
                                                <div class="labels">
                                                    <span class="sale-label">-50%</span>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="biolife-countdown" data-datetime="2020/02/18 00:00:00"></div>
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
                                                        <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product deal-layout contain-product__deal-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/home-03/product_deal-02_330x330.jpg') }}" alt="dd" width="330" height="330" class="product-thumnail">
                                                </a>
                                                <div class="labels">
                                                    <span class="sale-label">-50%</span>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="biolife-countdown" data-datetime="2020/04/18 00:00:00"></div>
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
                                                        <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product deal-layout contain-product__deal-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/home-03/product_deal-03_330x330.jpg') }}" alt="dd" width="330" height="330" class="product-thumnail">
                                                </a>
                                                <div class="labels">
                                                    <span class="sale-label">-50%</span>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="biolife-countdown" data-datetime="2020/01/18 00:00:00"></div>
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
                                                        <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6">
                            <div class="advance-product-box">
                                <div class="biolife-title-box bold-style biolife-title-box__bold-style">
                                    <h3 class="title">Top Rated Products</h3>
                                </div>
                                <ul class="products biolife-carousel eq-height-contain nav-center-03 nav-none-on-mobile row-space-29px" data-slick='{"rows":2,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":2,"responsive":[{"breakpoint":1200,"settings":{ "rows":2, "slidesToShow": 2}},{"breakpoint":992, "settings":{ "rows":2, "slidesToShow": 1}},{"breakpoint":768, "settings":{ "rows":2, "slidesToShow": 2}},{"breakpoint":500, "settings":{ "rows":2, "slidesToShow": 1}}]}'>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-19.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Pumpkins Fairytale</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-03.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Passover Cauliflower</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-02.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Hot Chili Peppers</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-22.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Cherry Tomato Seeds</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-05.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Organic Hass Avocado</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-06.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">Packham's Pears</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item">
                                        <div class="contain-product right-info-layout contain-product__right-info-layout">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    <img src="{{ asset('storage/images/products/p-20.jpg') }}" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Vegetables</b>
                                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                <div class="price ">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                                <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(05 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="biolife-banner style-01 biolife-banner__style-01 xs-margin-top-80px-im sm-margin-top-30px-im">
                                    <div class="banner-contain">
                                        <a href="#" class="bn-link"></a>
                                        <div class="text-content">
                                            <span class="first-line">Daily Fresh</span>
                                            <b class="second-line">Natural</b>
                                            <i class="third-line">Fresh Food</i>
                                            <span class="fourth-line">Premium Quality</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 07: Brands-->
            <div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}},{"breakpoint":450, "settings":{ "slidesToShow": 1, "slidesMargin":10}}]}'>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-01.jpg') }}" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-02.jpg') }}" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-03.jpg') }}" width="153" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-04.jpg') }}" width="224" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-01.jpg') }}" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-02.jpg') }}" width="214" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-03.jpg') }}" width="153" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="{{ asset('storage/images/home-03/brd-04.jpg') }}" width="224" height="163" alt=""></figure>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Block 08: Blog Posts-->
            <div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
                <div class="container">
                    <div class="biolife-title-box">
                        <span class="subtitle">The freshest and most exciting news</span>
                        <h3 class="main-title">From the Blog</h3>
                    </div>
                    <ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02 ">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-01.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-02.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-04.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-03.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-05.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-item effect-01 style-bottom-info layout-02">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="{{ asset('storage/images/our-blog/post-thumb-06.jpg') }}" width="370" height="270" alt=""></a>
                                    <div class="post-date">
                                        <span class="date">26</span>
                                        <span class="month">dec</span>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-meta__item author"><img src="{{ asset('storage/images/home-03/post-author.png') }}" width="28" height="28" alt=""><span>Admin</span></a>
                                        <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                        <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                        <div class="post-meta__item post-meta__item-social-box">
                                            <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                            <div class="inner-content">
                                                <ul class="socials">
                                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                    <div class="group-buttons">
                                        <a href="#" class="btn readmore">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection