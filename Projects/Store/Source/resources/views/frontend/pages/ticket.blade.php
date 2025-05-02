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
    <title>Ticket</title>

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


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Ticket</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->



<div class="col-6 mx-auto" style="margin: 30px 0px;">
    @if($info !== null)
        <div style="display: flex; align-items: center;">
            <h3>Status :&nbsp</h3>
            @if($info->status === 'read')
                <h3 style="color: darkgreen;">Read</h3>
            @else
                <h3 style="color: maroon; cursor: help;">Unread</h3>
            @endif
        </div>
    @endif
    <form class="row contact_form" action="{{ route('ticket.submit') }}" method="post" novalidate="novalidate">
        @csrf
        <div class="col-md-12">
            @if($info === null)
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="2" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" value="submit" class="primary-btn">Send Message</button>
            </div>
            @else
            <div class="form-group">
                <input type="text" class="form-control" name="subject" value="{{ $info->subject }}" readonly>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" rows="2" readonly>{{ $info->message }}</textarea>
            </div>
        </div>
    @endif
</div>


                    </form>
                </div>

    
@include('frontend.body.footer')
@include('frontend.body.cart')


</body>

</html>