<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->

    @auth
    <title>{{ $seo-> meta_title }} > Ticket</title>
    @else
    <title>{{ $seo-> meta_title }} > Contact</title>
    @endauth

    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          @auth
          <span class="breadcrumb"><a href="/">Home</a>  /  Ticket</span>
          <h3>Ticket</h3>
          @else
          <span class="breadcrumb"><a href="/">Home</a>  /  Contact</span>
          <h3>Contact</h3>
          @endauth

        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            @auth
            <h6>| Ticket</h6>
            @else
            <h6>| Contact</h6>
            @endauth
            <h2>Get In Touch With Our Agents?</h2>
          </div>
          <p>one click, simple steps.</p>
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
          

          <form id="contact-form"action="{{route('contact.save')}}" method="POST" novalidate="novalidate">
							@csrf

            <div class="row">

            
                <div id="name_div" class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required value="{{ $user->name }}">
                </fieldset>
              </div>

              <div id="email_div" class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="" value="{{ $user->email }}">
                </fieldset>
              </div>


              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>

<input hidden placeholder="Status" name="status" id="status" value="unread" required></input>

</div>

          </form>
        </div>

        <div class="col-lg-12">
          <div id="map">
            <iframe src="{{ $seo->meta_map }}" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
        </div>


      </div>
    </div>
  </div>


 @include('frontend.body.footor')

@include('frontend.body.extra')

<script type="text/javascript">
// Get the values of Full Name and Email Address
const nameValue = document.getElementById('name').value;
const emailValue = document.getElementById('email').value;

// Check if the values are not empty
if (nameValue.trim() !== '' && emailValue.trim() !== '') {
  // If values are not empty, hide the input fields

  document.getElementById('name').readOnly = true;
  document.getElementById('email').readOnly = true;
  document.getElementById('name_div').style.display = 'none';
  document.getElementById('email_div').style.display = 'none';
}
</script>
  </body>
</html>
