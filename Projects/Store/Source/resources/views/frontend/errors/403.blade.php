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
    <title>Error</title>

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


</head>

<body>


 <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">

     @include('frontend.errors.header')
 
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Error 403</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <p>you do not have permission to access a web page.</p>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->



@include('frontend.body.footer')
</body>

</html>