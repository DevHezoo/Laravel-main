@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.body.header')
<title>{{ $seo-> meta_title }} > Price</title>
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
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['Pricing'] }}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>


</div>




      <div class="site-section">
        <div class="container">
          
          <div class="row justify-content-center text-center">
            <div class="col-md-7 mb-5">
              <h2 class="section-heading">{{ $translations['Choose_A_Plan'] }}</h2>
              <p>{{ $translations['Choose_A_Plan_Description'] }}</p>
            </div>
          </div>
          <div class="row align-items-stretch">

            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="pricing h-100 text-center">
                <span>&nbsp;</span>
                <h3>{{ $translations['Free_title'] }}</h3>
                <ul class="list-unstyled">
                  <li>{{ $translations['Free_Advan1'] }}</li>
                </ul>
                <div class="price-cta">
                  <strong class="price">{{ $translations['Free'] }}</strong>
                  <p><a href="#" class="btn btn-white">{{ $translations['Choose_A_Plan'] }}</a></p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="pricing h-100 text-center popular">
                <span class="popularity">{{ $translations['Popular_title'] }}</span>
                <h3>{{ $translations['Popular_title2'] }}</h3>
                <ul class="list-unstyled">
                  <li>{{ $translations['Premium_Advan2_1'] }}</li>
                  <li>{{ $translations['Premium_Advan2_2'] }}</li>
                  <li>{{ $translations['Premium_Advan2_3'] }}</li>
                  <li>{{ $translations['Premium_Advan2_4'] }}</li>
                </ul>
                <div class="price-cta">
                  <strong class="price">$9.95/month</strong>
                  <p><a href="#" class="btn btn-white">{{ $translations['Choose_A_Plan'] }}</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="pricing h-100 text-center">
                <span class="popularity">{{ $translations['Expert_title'] }}</span>
                <h3>{{ $translations['Expert_title2'] }}</h3>
                <ul class="list-unstyled">
                  <li>{{ $translations['Expert_Advan3_1'] }}</li>
                  <li>{{ $translations['Expert_Advan3_2'] }}</li>
                  <li>{{ $translations['Expert_Advan3_3'] }}</li>
                </ul>
                <div class="price-cta">
                  <strong class="price">$199.95/month</strong>
                  <p><a href="#" class="btn btn-white">{{ $translations['Choose_A_Plan'] }}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')


</body>

</html>
