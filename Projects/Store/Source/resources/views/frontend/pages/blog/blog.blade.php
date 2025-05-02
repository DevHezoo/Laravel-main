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
    <title>News</title>
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
    <!-- End Header Area -->
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Blogs Page</h1>
				</div>
			</div>
		</div>
	</section>

	<!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section style="margin-top:20px" class="blog_area">
        <div class="container">
            <div class="row">

            	
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">


@foreach($blogs as $key => $blog)
@php
$user = App\Models\User::where('id', $blog->author_id)->first();
@endphp
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a>Blogs,&nbsp</a>
                                        <a class="active">{{$key + 1}}</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a>{{ $user->username }}<i class="lnr lnr-user"></i></a></li>
                                        <li><a>{{ $blog->created_at }}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a>{{$blog->views}} Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a>{{$blog->comments}} Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img width="495" height="297" src="{{ asset('frontend/upload/blogs/thumbnail/' .$blog->thumbnail) }}" alt="">
                                    <div class="blog_details">
                                        <a>
                                            <h2>{{$blog->title}}</h2>
                                        </a>
                                        <p>{{$blog->short_description}}.</p>
                                        <a href="/blog/view/{{$blog->id}}" class="white_bg_btn">View</a>
                                    </div>
                                </div>
                            </div>
                        </article>

@endforeach


                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">

                            <img height="120" width="120" class="author_img rounded-circle" src="{{ (!empty($admin->photo)) ? '/frontend/upload/admin_images/'.$admin->photo : '/frontend/upload/no_image.jpg' }}" alt="">

                            <h4>{{ $admin->name }}</h4>
                            <p>{{ $admin->username }}</p>
                            <div class="social_icon">
                                <a href="{{ $admin->social_link }}"><i class="fa fa-facebook"></i></a>
                            </div>
                            <p>{{ $admin->vendor_short_info }}.</p>
                        
                        </aside>

 

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->



@include('frontend.body.footer')

@include('frontend.body.cart')
</body>

</html>