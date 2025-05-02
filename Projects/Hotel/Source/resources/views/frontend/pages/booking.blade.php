<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
  	 
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Booking</title>

   @include('frontend.body.header')
    <script src="https://js.stripe.com/v3/"></script>
  </head>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a>  /  Booking</span>
          <h3>Booking</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Order</h6>
            <h2>Order Page?</h2>
          </div>
          <p>Order Item.</p>
          <div class="row">
            
            <div class="col-lg-12">
              <div class="item phone">
                <img src="{{ asset('frontend/' . $property->property_thumbnail) }}" alt="" style="max-width: 52px;">
               
                <h6>
                  {{Illuminate\Support\Str::limit($property->property_slug, 15, '..!')}}

                <br><span>Price : ${{ $property->property_price}} | ID : {{ $property->id}}</span></h6>
       
              </div>
            </div>


          </div>
        </div>
        <div class="col-lg-6">				
<form id="contact-form" action="{{ route('order') }}" method="POST" novalidate="novalidate">
   @csrf

            <div class="row">

<div class="col-lg-12">
    <fieldset>
        <label for="name">Identity Number</label>
        <input type="text" name="Identity_Number" id="Identity_Number" placeholder="Passport Number / National Identification Number" autocomplete="on" required
                value="{{ $user->passport }}" {{ $user->passport ? 'readonly' : '' }}>
    </fieldset>
</div>
  <div class="col-lg-12">
        <fieldset>
            <label for="checkin">Check-in Date</label>
            <input type="text" name="checkin" id="checkin" class="datepicker checkin" placeholder="Select Check-in Date" readonly>
        </fieldset>
    </div>

    <div class="col-lg-12">
        <fieldset>
            <label for="checkout">Check-out Date</label>
            <input type="text" name="checkout" id="checkout" class="datepicker checkout" placeholder="Select Check-out Date" readonly>
        </fieldset>
    </div>

<input type="hidden" name="property_qty" id='property_qty' value="{{ $property->property_qty }}">
<input type="hidden" name="property_price" value="{{ $property->property_price }}">
<input type="hidden" name="property_id" id='property_id' value="{{ $property->id }}">
<input type="hidden" name="property_payment" value="{{ $property->property_payment }}">
<input type="hidden" name="property_name" value="{{ $property->property_slug }}">
<input type="hidden" name="user" value="{{ $user->id }}">
<input type="hidden" name="user_name" value="{{ $user->name }}">
<input type="hidden" name="user_email" value="{{ $user->email }}">

  <div class="col-lg-12">
  <fieldset>
<label for="card-element">Check-out Date</label>
<div style="margin-bottom: 30px;" id="card-element">
<!-- A Stripe Element will be inserted here. -->
</div>
<!-- Used to display form errors. -->
<div id="card-errors" role="alert"></div>
        </fieldset>
    </div>

@if(session('notifications'))
    @foreach(session('notifications') as $notification)
        <div class="alert alert-{{ $notification['alert-type'] }}">
            {{ $notification['message'] }}
        </div>
    @endforeach
@endif

  <div class="col-lg-12 d-flex align-items-center justify-content-center">
  <fieldset>
    <button type="submit" id="form-submit" class="orange-button">Complete Order</button>
  </fieldset>
</div>


            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

 @include('frontend.body.footor')

<style>
    .existing-checkin-date{
        color: red;
        font-size: 1.3rem;
    }

    .existing-checkout-date{
        color: limegreen;
        font-size: 1.3rem;
    }
</style> 


<script>

$(document).ready(function() {


 

// Fetch existing check-in dates from the backend using an AJAX call
    $.ajax({
        url: '/get-existing-checkin-dates', // Adjust the URL to your Laravel route
        type: 'GET',
        dataType: 'json',
        success: function (response) {

        // Initialize the datepicker with the fetched check-in dates
        initializeDatepicker_checkin(response.data);

        },
        error: function (error) {
            console.error('Error fetching existing check-in dates:', error);
        }
    });


// Fetch existing check-in dates from the backend using an AJAX call
    $.ajax({
        url: '/get-existing-checkout-dates', // Adjust the URL to your Laravel route
        type: 'GET',
        dataType: 'json',
        success: function (response) {

        // Initialize the datepicker with the fetched check-in dates
        initializeDatepicker_checkout(response.data);

        },
        error: function (error) {
            console.error('Error fetching existing check-in dates:', error);
        }
    });

function initializeDatepicker_checkin(existingCheckInDates) {


    $('.datepicker.checkin').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        beforeShowDay: function (date) {
            var dateString = formatDate(date);

            // Check if the date is in the array of existing check-in dates
            // If yes, add a class to make it gray
            var isExistingCheckInDate = existingCheckInDates.indexOf(dateString) !== -1;

            return {
                classes: isExistingCheckInDate ? 'existing-checkin-date' : ''  // Add a class for styling
            };
        }
    });

}


function initializeDatepicker_checkout(existingCheckInDates) {

    $('.datepicker.checkout').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        beforeShowDay: function (date) {
            var dateString = formatDate(date);

            // Check if the date is in the array of existing check-in dates
            // If yes, add a class to make it gray
            var isExistingCheckInDate = existingCheckInDates.indexOf(dateString) !== -1;

            return {
                classes: isExistingCheckInDate ? 'existing-checkout-date' : ''  // Add a class for styling
            };
        }
    });

}



    function formatDate(date) {
        var year = date.getFullYear();
        var month = (date.getMonth() + 1).toString().padStart(2, '0');
        var day = date.getDate().toString().padStart(2, '0');
        return year + '-' + month + '-' + day;
    }




// Create a Stripe client.
var stripe = Stripe('{{ $seo->meta_stripe_client}}');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});



// Handle form submission.
var form = document.getElementById('contact-form');
form.addEventListener('submit', function(event) {

        var checkin = $('#checkin').val();
        var checkout = $('#checkout').val();
        var propertyId = $('#property_id').val();
        var propertyqty = $('#property_qty').val();

        var Identity_Number = $('#Identity_Number').val();
        var card_element = $('#card-element').val();

        // Display a loading toast
    toastr.warning('Please Wait!', 'Booking..', { timeOut: 0, extendedTimeOut: 0 });


$.ajax({
    type: 'POST',
    url: '/check-room-availability',
    data: {
        propertyId: propertyId,
        propertyQty: propertyqty,
        checkIn: checkin,
        checkOut: checkout,
        Identity_Number: Identity_Number,
        card_element: card_element,
        _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (response) {
        if (response.available) {
            // Room is available, proceed with the booking logic
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // console.log('error')
                    // Display an error toast
                    toastr.error(result.error.message, 'Payment Error');
                     // console.log(result.error.message, 'Payment Error');
                } else {
                    stripeTokenHandler(result.token);
                    console.log(result.token);
                }
            });
        } else {
            // Display a warning toast
            // toastr.warning('Use Another Date!', 'Room Not Available');
        }
    },
    error: function (xhr) {
        if (xhr.status === 422) {
            // Validation error
            var errors = xhr.responseJSON.errors;
            // Display validation error messages
            for (var key in errors) {
                toastr.error(errors[key][0], 'Validation Error');
                 // console.log(errors[key][0], 'Validation Error')
            }
        } else {
            // Handle other AJAX errors
            toastr.error('An error occurred', 'Error');

        }
    },
});



});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    if (token.id) {

  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('contact-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
    } else {
    // If token.id is empty, redirect to an error page
    window.location.href = '/frontend/pages/error/booking';
  }

}
});
</script>

  @include('frontend.body.extra')

  </body>
</html>
