@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

@include('frontend.body.header')
<title>{{ $seo-> meta_title }}</title>

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





      <div class="hero-section">
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
            <div class="col-12 hero-text-image">
              <div class="row">
                <div class="col-lg-7 text-center text-lg-left">
                  <h1 data-aos="fade-right">{{ $translations['Description_1'] }}</h1>
                  <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                    {{ $translations['Description_2'] }}<br>{{ $translations['Description_3'] }}</p>
                
                @auth
                <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="/live"
                      class="btn btn-outline-white">{{ $translations['Live'] }}</a></p>
                @else
                <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="/login"
                      class="btn btn-outline-white">{{ $translations['Demo'] }}</a></p>
                @endauth

                </div>

              </div>
            </div>
          </div>
        </div>

</div>



      <div class="site-section">
        <div class="container">

          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-5" data-aos="fade-up">
              <h2 class="section-heading">{{ $translations['Save_Time'] }} {{ $seo-> meta_title }}</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-users"></span>
                </div>
                <h3 class="mb-3">{{ $translations['Op1'] }}</h3>
                <p>{{ $translations['Opp1'] }}</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-toggle-off"></span>
                </div>
                <h3 class="mb-3">{{ $translations['Op2'] }}</h3>
                <p>{{ $translations['Opp2'] }}</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-umbrella"></span>
                </div>
                <h3 class="mb-3">{{ $translations['Op3'] }}</h3>
                <p>{{ $translations['Opp3'] }}</p>
              </div>
            </div>
          </div>

        </div>
      </div> <!-- .site-section -->

      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5" data-aos="fade">
            <div class="col-md-6 mb-5">

              <img src="{{ asset('frontend/img/undraw_svg_1.svg') }}" alt="Image" class="img-fluid">



            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="step">
                <span class="number">01</span>
                <h3>{{ $translations['Steps1'] }}</h3>
                <p>{{ $translations['Step1'] }}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step">
                <span class="number">02</span>
                <h3>{{ $translations['Steps2'] }}</h3>
                <p>{{ $translations['Step2'] }}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step">
                <span class="number">03</span>
                <h3>{{ $translations['Steps3'] }}</h3>
                <p>{{ $translations['Step3'] }}</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .site-section -->



      <div class="site-section pb-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 mr-auto">
              <h2 class="mb-4">{{ $translations['More'] }}</h2>
              <p class="mb-4">{{ $translations['More_Description'] }}</p>
              <p><a href="#">{{ $translations['Visit'] }}</a></p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
              <img src="{{ asset('frontend/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid">


            </div>
          </div>
        </div>
      </div> <!-- .site-section -->




      <div class="site-section border-top border-bottom">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-4">
              <h2 class="section-heading">{{ $translations['Reviews_From_Users'] }}</h2>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-7">
              <div class="owl-carousel testimonial-carousel">
                <div class="review text-center">
                  <p class="stars">
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star muted"></span>
                  </p>
                  <h3>Excellent App!</h3>
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                      aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                      provident voluptates consectetur maiores quos.</p>
                  </blockquote>



                  <p class="review-user">
                    <img src="{{ asset('frontend/img/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle mb-3">
                    <span class="d-block">
                      <span class="text-black">Jean Doe</span>, &mdash; App User
                    </span>
                  </p>

                </div>

                <div class="review text-center">
                  <p class="stars">
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star muted"></span>
                  </p>
                  <h3>This App is easy to use!</h3>
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                      aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                      provident voluptates consectetur maiores quos.</p>
                  </blockquote>



                  <p class="review-user">
                    <img src="{{ asset('frontend/img/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle mb-3">
                    <span class="d-block">
                      <span class="text-black">Johan Smith</span>, &mdash; App User
                    </span>
                  </p>

                </div>


                <div class="review text-center">
                  <p class="stars">
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star muted"></span>
                  </p>
                  <h3>Awesome functionality!</h3>
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                      aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                      provident voluptates consectetur maiores quos.</p>
                  </blockquote>



                  <p class="review-user">
                    <img src="{{ asset('frontend/img/person_3.jpg') }}" alt="Image" class="img-fluid rounded-circle mb-3">
                    <span class="d-block">
                      <span class="text-black">Jean Thunberg</span>, &mdash; App User
                    </span>
                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="site-section cta-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mr-auto text-center text-md-left mb-5 mb-md-0">
              <h2>{{ $translations['Our_App'] }}</h2>
            </div>
            <div class="col-md-5 text-center text-md-right">
              <p><a href="#" class="btn"><span class="icofont-brand-apple mr-3"></span>App store</a> <a href="#"
                  class="btn"><span class="icofont-ui-play mr-3"></span>Google play</a></p>
            </div>
          </div>
        </div>
      </div>


    </main>


  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')



</body>

</html>
