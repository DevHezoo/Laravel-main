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
    <title>Confirmation</title>

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

</head>


<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">

@include('frontend.body.nav')

        </div>
    </header>

    <!--================Blog Area =================-->
 <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Confirmation</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

        <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
            <div class="row order_d_inner">
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Order Info</h4>
                        <ul class="list">
                            <li><a><span>Order number</span> : {{ $infos['order']['order_number'] }}</a></li>
                            <li><a><span>Date</span> : {{ $infos['order']['created_at'] }}</a></li>
                            <li><a><span>Total</span> : ${{ $infos['order']['Paid_Price'] }}</a></li>
                            <li><a><span>Payment method</span> : {{ $infos['order']['Payment_Type'] }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Shipping Address</h4>
                        <ul class="list">
                            <li><a><span>Address</span> : {{ $infos['order']['address'] }}</a></li>
                            <li><a><span>Postcode</span> : {{ $infos['order']['post_code'] }}</a></li>
                            <li><a><span>Send To</span> : {{ $infos['order']['send_to'] }}</a></li>
                            <li><a><span>Status </span> : {{ $infos['order']['status'] }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Order Details</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

@foreach($items as $key => $item)
                            <tr>
                                <td>
                                    <a style="color:black;" href="/shop/product/details/{{$item->product->id}}">
                                        <p>{{$key + 1}}. {{$item->product->product_slug}}</p>
                                    </a>
                                    
                                </td>
                                <td>
                                    <h5>x {{$item->qty}}</h5>
                                </td>
                                <td>
                                    <p>${{$item->product->product_price}}</p>
                                </td>
                            </tr>

@endforeach
                            <tr>
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>${{ $infos['order']['Paid_Price'] }}</p>
                                </td>
                            </tr>



                        </tbody>
                    </table>            
                </div>

            </div>
                                <br>
                                <div style="width: 100%; text-align:center;justify-content: center;" class="cupon_text d-flex align-items-center">
                                        <a class="primary-btn" href="/order/view/{{ $infos['order']['order_number'] }}">View Order</a>
                                    </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->

    
@include('frontend.body.footer')
@include('frontend.body.cart')

</body>

</html>