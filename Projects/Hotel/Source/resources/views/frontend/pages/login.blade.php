<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Login</title>

    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a>  /  Login</span>
          <h3>Login</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Log in</h6>
            <h2>Already a Member?</h2>
          </div>
          <p>Login to book a room.</p>
          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="{{ asset('frontend/assets/images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>{{$seo->meta_phone}}<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item email">
                <img src="{{ asset('frontend/assets/images/email-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>{{ $seo->meta_email}}<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          

          <form id="contact-form"action="{{route('login')}}" method="POST" novalidate="novalidate">
							@csrf

            <div class="row">

              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="" onfocus="this.removeAttribute('readonly');" readonly>
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" placeholder="Password..." autocomplete="on" onfocus="this.removeAttribute('readonly');" readonly>
                </fieldset>
              </div>


   <div class="col-lg-12 d-flex align-items-center justify-content-center">
  <fieldset>
    <button type="submit" id="form-submit" class="orange-button">Sign In</button>
  </fieldset>
</div>
</div>

          </form>


        </div>
      </div>
    </div>
  </div>


 @include('frontend.body.footor')

  @include('frontend.body.extra')
  </body>
</html>

<script type="text/javascript">
// Display a success toast, with a title
</script>