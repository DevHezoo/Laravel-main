<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
  	 
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Register</title>

   @include('frontend.body.header')

  </head>

<body>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a>  /  Register</span>
          <h3>Register</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Sign Up</h6>
            <h2>Become a Member?</h2>
          </div>
          <p>Signup to book a room.</p>
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
          <form id="contact-form" action="{{ route('register') }}" method="POST" novalidate="novalidate">
@csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required onfocus="this.removeAttribute('readonly');" readonly>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="" onfocus="this.removeAttribute('readonly');" readonly>
                </fieldset>
              </div>
               

                <div class="col-lg-12">
                <fieldset>
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" pattern="[^ @]*@[^ @]*" placeholder="Your Password..." required="" onfocus="this.removeAttribute('readonly');" readonly>

                  <input hidden type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                </fieldset>
              </div>   


<!-- Your phone input field -->
<div style="margin-bottom: 30px;">
  <label for="phone">Phone</label>
  <div class="col-lg-12">
  	<fieldset>
    <input style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; padding-left: 75px;;" type="tel" id="phone" name="phone" placeholder="Your phone number">
    <!-- Hidden input for storing country code and phone number -->
  <input type="hidden" id="fullPhone" name="fullPhone">
  </fieldset>
  </div>
</div>


              <div class="col-lg-12 d-flex align-items-center justify-content-center">
  <fieldset>
    <button type="submit" id="form-submit" class="orange-button">Sign Up</button>
  </fieldset>
</div>


            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


 @include('frontend.body.footor')
 
<script>
	$(document).ready(function() {

  const input = document.querySelector("#phone");
  const fullPhoneInput = document.querySelector("#fullPhone");

  var iti = window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
  });

  input.addEventListener('input', function () {
    var full = iti.getNumber();
    var code = iti.getSelectedCountryData();
    
    // Set the value of the hidden input
    fullPhoneInput.value =  full;

  });

var passwordInput = document.querySelector("#password");
passwordInput.addEventListener('input', function () {
 document.querySelector("#password_confirmation").value = passwordInput.value;
});


  $('.iti.iti--allow-dropdown.iti--show-flags').css('width', '100%');
});

</script>
  @include('frontend.body.extra')
  </body>
</html>

