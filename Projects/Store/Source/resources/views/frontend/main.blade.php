<!-- {{ asset('frontend/main_assets/') }} -->

<!-- Calling The DB to Edit Website Seo Settings -->
<!-- meta_title meta_author meta_keyword meta_description -->
@php
$seo = App\Models\Seo::find(1);
@endphp
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
     @include('frontend.body.header')
    <!-- Author Meta -->
    <meta name="author" content="{{ $seo-> meta_author }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ $seo-> meta_description }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $seo-> meta_keyword }}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }}</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/main.css') }}">


    <!--
        Font
        ============================================= -->

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/linearicons-v1.0.0/icon-font.min.css') }}">


    @include('frontend.body.quickview')
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">


            @include('frontend.body.nav')


        </div>

    </header>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
           
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>{{ $seo-> meta_title }}</h1>
                </div>
            </div>


        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('frontend/main_assets/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('frontend/main_assets/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('frontend/main_assets/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('frontend/main_assets/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area name, url, img-->
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">

                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" height="160" width="400" src="{{ asset('frontend/' . $banners[1]->img ) }}" alt="">
                                <a href="{{ $banners[1]->url }}" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $banners[1]->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" height="155" width="180" src="{{ asset('frontend/' . $banners[2]->img ) }}" alt="">
                                <a href="{{ $banners[2]->url }}" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $banners[2]->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" height="155" width="180" src="{{ asset('frontend/' . $banners[3]->img ) }}" alt="">
                                <a href="{{ $banners[3]->url }}" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $banners[3]->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" height="160" width="400" src="{{ asset('frontend/' . $banners[4]->img ) }}" alt="">
                                <a href="{{ $banners[4]->url }}" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $banners[4]->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('frontend/main_assets/img/category/c5.jpg') }}" alt="">
                        <a href="{{ $banners[5]->url }}" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">{{ $banners[5]->name }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End category Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    

@foreach($products as $product)

                    <!-- single product {Foreach}-->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
    
    <img 
    data-name = '{{ $product->product_name}}'
    data-img = '{{ $product->product_thumbnail}}'
    data-desc = '{{ $product->short_desc}}'
    data-price = '{{ $product->product_price}}'
    data-disc = '{{ $product->discount_price}}'
    data-code = '{{ $product->product_code}}'
    
    onclick="openQuickViewModal(this)"


    class="img-fluid" src="{{ asset('frontend/' . $product->product_thumbnail) }}" alt="">
                            <div class="product-details">
                                <h6>{{ $product-> product_name}}</h6>
                                <div class="price">
                                    <h6>${{ $product-> product_price}}</h6>
                                    <h6 class="l-through">${{ $product-> discount_price}}</h6>
                                </div>
                                <div class="prd-bottom">

                                    <!-- <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a> -->

                                    @auth
                                    <a style="cursor: pointer;" data-product-id='{{$product->id}}' class="social-info add-wishlist-btn">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a style="cursor: pointer;" data-product-id='{{$product->id}}' class="social-info add-compare-btn">
                                        <span class="lnr lnr-eye"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    @endauth

                                    <a href="/shop/product/details/{{$product->id}}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

@endforeach    


                </div>
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Coming Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="row">



 @foreach($coming_products as $coming_product)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('frontend/' . $coming_product->product_thumbnail) }}" alt="">
                            <div class="product-details">
                                <h6>{{ $coming_product->product_name }}</h6>
                                <div class="prd-bottom">

                                   
                                </div>
                            </div>
                        </div>
                    </div>

@endforeach
  



                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">


<div class="row clock_sec clockdiv" id="clockdiv">
    <div class="col-lg-12">
        <h1>Exclusive Hot Deal Ends Soon!</h1>
        <p>Who are in extremely love with the eco-friendly system.</p>
    </div>
    <div class="col-lg-12">
        <div class="row clock-wrap">
            <div class="col clockinner1 clockinner">
                <h1 class="days"></h1>
                <span class="smalltext">Days</span>
            </div>
            <div class="col clockinner clockinner1">
                <h1 class="hours"></h1>
                <span class="smalltext">Hours</span>
            </div>
            <div class="col clockinner clockinner1">
                <h1 class="minutes"></h1>
                <span class="smalltext">Mins</span>
            </div>
            <div class="col clockinner clockinner1">
                <h1 class="seconds"></h1>
                <span class="smalltext">Secs</span>
            </div>
        </div>
    </div>
</div>


                    <a href="/shop/?page=1" class="primary-btn">Shop Now</a>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">
                      
                       <!-- Iterate Through exclusive products -->
                      @foreach($productDetails as $product)

                        <!-- single exclusive carousel -->
                        <div class="single-exclusive-slider">
                            <img 

    data-name = "{{  $product['product_name'] }}"
    data-img = "{{ $product['product_thumbnail'] }}"
    data-desc = "{{ $product['short_desc'] }}"
    data-price = "{{ $product['product_price'] }}"
    data-disc = "{{ $product['discount_price'] }}"
    data-code = "{{ $product['product_code'] }}"
    
    onclick="openQuickViewModal(this)"


                            class="img-fluid" src="{{ asset('frontend/' . $product['product_thumbnail'] )}}" alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>${{ $product['product_price'] }}</h6>
                                    <h6 class="l-through">${{ $product['discount_price'] }}</h6>
                                </div>
                                <h4>{{ $product['product_name'] }}</h4>
                               
                            </div>
                        </div>


                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/brand/1.png') }}" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/brand/2.png') }}" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/brand/3.png') }}" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/brand/4.png') }}" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/brand/5.png') }}" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-9">
                    <div class="row">

                        @foreach($deal as $deal)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img width="70" height="70" src="{{ asset('frontend/' .$deal->product_thumbnail) }}" alt=""></a>
                                <div class="desc">
                                    <a href="/shop/product/details/{{ $deal->product_code }}" class="title">{{$deal->product_name}}</a>
                                    <div class="price">
                                        <h6>${{$deal->product_price}}</h6>
                                        <h6 class="l-through">${{$deal->discount_price}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="{{ $banners[0]->url }}" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/category/c5.jpg') }}" alt="">
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End related-product Area -->

@include('frontend.body.footer')
@include('frontend.extra.timer')

@include('frontend.body.cart')
</body>
</html>