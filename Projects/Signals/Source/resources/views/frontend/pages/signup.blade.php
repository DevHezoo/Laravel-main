@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.body.header')
<title>{{ $seo-> meta_title }} > Register</title>
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
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['Sign_Up'] }}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>


</div>




      <div class="site-section">
      <div class="container">
        <div class="row mb-5 align-items-end">
          <div class="col-md-6" data-aos="fade-up">
          
            <h2>{{ $translations['Sign_Up'] }}</h2>
          </div>
          
        </div>
        
            <div class="row">
              <div class="col-md-4 ml-auto order-2"  data-aos="fade-up">


                   <form method="POST" action="{{ route('register') }}" role="form">
                @csrf
                  <div class="row">

                    <div class="col-md-12 form-group">
                      <label for="name">{{ $translations['Full_Name'] }}</label>
                      <input type="name" class="form-control" name="name" id="name" data-rule="minlen:5" data-msg="Please enter your full name" />
                      <div class="validate"></div>
                    </div>

                    <div class="col-md-12 form-group">
                      <label for="email">{{ $translations['Email'] }}</label>
                      <input type="email" class="form-control" name="email" id="email" data-rule="minlen:8" data-msg="Please enter your email" />
                      <div class="validate"></div>
                    </div>

                    <div class="col-md-12 form-group">
                      <label for="password">{{ $translations['Password'] }}</label>
                      <input type="password" class="form-control" name="password" id="password" data-rule="minlen:2" data-msg="Please enter your password" />
                      <div class="validate"></div>
                    </div>

                    <div class="col-md-12 form-group">
                      <label for="password_confirmation">{{ $translations['Password_Confirm'] }}</label>
                      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" data-rule="minlen:2" data-msg="Please Confirm your password" />
                      <div class="validate"></div>
                    </div>


<div class="col-md-6 form-group">
    <div style="display: inline-flex; align-items: center;">
        <input type="submit" class="btn btn-primary" value="{{ $translations['Sign_Up'] }}">
        <p style="margin: 0 10px;">{{ $translations['Or'] }}</p>
        

<button style="background-color: transparent; border: none;">
    <a href="/login" style="display: inline; text-decoration: none; color: inherit; white-space: nowrap;">
        {{ $translations['Log_In'] }}
    </a>
</button>




    </div>
</div>



                  </div>
    
                </form>


              </div>

              <div class="col-md-6 mb-5 mb-md-0"  data-aos="fade-up">



                <ul class="list-unstyled">
                  <li class="mb-3">
                    <strong class="d-block mb-1">{{ $translations['Sign_Up'] }}</strong>
                    <span>{{ $translations['SignUp_To_Start'] }}</span>
                  </li>
                </ul>

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
