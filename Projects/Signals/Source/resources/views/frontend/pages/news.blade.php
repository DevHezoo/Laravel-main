@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.body.header')
<title>{{ $seo-> meta_title }} > News</title>
@include('frontend.body.icon')
@include('frontend.body.init')

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

@include('frontend.body.extra.header')


    <main id="main">





      <div class="hero-section inner-page">
        <div class="wave">

          <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path
                  d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                  id="Path"></path>
              </g>
            </g>
          </svg>

        </div>


        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['News'] }}</h1>
                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100">{{$Last->created_at}} >> <a style="color:white;">{{$author_last->name}}</a></p>  
                </div>
              </div>
            </div>
          </div>
        </div>

</div>



<div class="site-section">
        <div class="container">
          <div class="row mb-5">
            

            @foreach($News as $New)

            @php
            $user = App\Models\User::where('id', $New->article_author_id)->first();
            @endphp

            <div class="col-md-4">
              <div class="post-entry">
                <a class="d-block mb-4">
                 <img src="{{ asset($New->article_img) }}" alt="Image" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">{{$New->created_at}} &bullet; By <a>{{$user->name}}</a></span>  
                  <h3><a>{{$New->article_title}}</a></h3>
                  <p>{{$New->article_short_desc}}.</p>
                  <p><a href="/blog/view/{{$New->id}}" class="readmore">{{ $translations['Read_More'] }}</a></p>
                </div>
              </div>
            </div>
            @endforeach


          </div>

<!--           <div class="row">
            <div class="col-12 text-center">
              <span class="p-3 active text-primary">1</span>
              <a href="#" class="p-3">2</a>
              <a href="#" class="p-3">3</a>
              <a href="#" class="p-3">4</a>
            </div>
          </div> -->

        </div>
      </div>



  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')


</body>

</html>
