<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Profile</title>

    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a>  /  Profile</span>
          <h3>Profile</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Profile</h6>
            <h2>My <br>Information?</h2>
          </div>
          <p>Profile Page.</p>
          <div class="row">

            <div class="col-lg-12">
              <div class="item phone">
                <img src="{{ asset('frontend/assets/images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>{{ $user->phone == null ? 'empty' : $user->phone }}<br><span>Phone Number</span></h6>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="item email">
                <img src="{{ asset('frontend/assets/images/email-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>{{ $user->email == null ? 'empty' : $user->email }}<br><span>Business Email</span></h6>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="item identity">
                <img src="{{ asset('frontend/assets/images/info-icon-02.png') }}" alt="" style="max-width: 52px;">
                <h6>{{ $user->passport == null ? 'empty' : $user->passport }}<br><span>Identity Number</span></h6>
              </div>
            </div>



       <div class="col-lg-12">

<h3 class="mb-30" style="margin-bottom:5px">Orders</h3>
                <div class="progress-table-wrap">
                    <div style="max-height: 353px; overflow-y: auto;" class="progress-table" >
                        <div class="table-head">


<div class="Id">#</div>
<div class="Date">Name</div>
<div class="Total">Invoice</div>
<div class="Payment">Price</div>
<div class="Invoice">Check In</div>
<div class="Status">Check Out</div>
<div class="Action">Action</div>


</div>

@if($order->isNotEmpty())

                
    @php
    $counter = 1;
    @endphp

    @foreach($order as $order)
@php
$name = App\Models\Property::where('id', $order->Property_ID)->first();
@endphp

<div class="table-row">
<div class="Id">{{ $counter }}</div>
<div class="Date">{{ $name->property_slug }}</div>
<div class="Total">{{$order->Property_Invoice_ID}}</div>
<div class="Payment">${{$order->Paid_Price}}</div>
<div class="Invoice">{{$order->Check_In}}</div>
<div class="Status">{{$order->Check_Out}}</div>
<div class="Action">

<a href="{{ url('invoice/view/' . $order->Property_Invoice_ID) }}" target="_blank">View</a>

</div>
</div>

    @php
    $counter++;
    @endphp

    @endforeach
@else
                   <div class="table-row align-items-center justify-content-center">
                    <div class="No-Orders" colspan="7">No orders found.</div>
                </div>
@endif







 </div>
</div>

 </div>



          </div>
        </div>
        <div class="col-lg-6">
          

<form id="contact-form"action="{{route('user.profile.update.information')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
							@csrf
            <div class="row">

<div class="col-lg-12">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">

            
<div id="imagePreview" style="background-image: url('{{ (!empty($user->photo)) ? url('frontend/upload/user_images/'.$user->photo) : url('frontend/upload/no_image.jpg') }}');">
</div>
        </div>
    </div>
    </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="text" name="name" id="name" pattern="[^ @]*@[^ @]*" placeholder="Your Full Name..." required="" onfocus="this.removeAttribute('readonly');" readonly value="{{ $user->name }}">
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <label for="number">Identity Number</label>
                  <input type="tel" name="number" id="number" placeholder="Identity Number..." autocomplete="on"   @if(!empty($user->passport)) readonly @endif value="{{ $user->passport }}">
                </fieldset>
              </div>



<!-- Your phone input field -->
<div style="margin-bottom: 30px;">
  <label for="phone">Phone</label>
  <div class="col-lg-12">
    <fieldset>
    <input style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; padding-left: 75px;;" type="tel" id="phone" name="phone" placeholder="Your phone number" value="{{$user->phone}}">
    <!-- Hidden input for storing country code and phone number -->
  <input type="hidden" id="fullPhone" name="fullPhone">
  </fieldset>
  </div>
</div>


   <div class="col-lg-12 d-flex align-items-center justify-content-center">
  <fieldset>
    <button type="submit" id="form-submit" class="orange-button">Update Info</button>
  </fieldset>
</div>
</div>
  </form>
<br>
<br>

<!--  -->


<form id="contact-form2"action="{{route('user.profile.update.password')}}" method="POST" novalidate="novalidate">
              @csrf
            <div class="row">

              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Old Password</label>
                  <input type="password" name="old_password" id="old_password" pattern="[^ @]*@[^ @]*" placeholder="Your Old Password..." required="" readonly onfocus="this.removeAttribute('readonly');"  value="">
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <label for="new_password">New Password</label>
                  <input type="password" name="new_password" id="new_password" placeholder="New Password..." required="" readonly onfocus="this.removeAttribute('readonly');"  value="">
                </fieldset>
              </div>


              <div class="col-lg-12">
                <fieldset>
                  <label for="number">Confirm New Password</label>
                  <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password..." required="" readonly onfocus="this.removeAttribute('readonly');"  value="">
                </fieldset>
              </div>


   <div class="col-lg-12 d-flex align-items-center justify-content-center">
  <fieldset>
    <button type="submit" class="orange-button">Update Password</button>
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


    ///////////////
  input.addEventListener('input', function () {
    var full = iti.getNumber();
    var code = iti.getSelectedCountryData();
    
    // Remove the country code (e.g., +20) from the full phone number
      var phoneNumberWithoutCountryCode = full.replace('+' + code.dialCode, '');
      
    // Set the value of the hidden input
    fullPhoneInput.value =  full;
  });
  ////////


  $('.iti.iti--allow-dropdown.iti--show-flags').css('width', '100%');
});

</script>
@include('frontend.body.avatar')
  @include('frontend.body.extra')
  </body>
</html>

