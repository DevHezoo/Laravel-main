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
    <title>Checkout</title>
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
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">

            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                           
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}">

                                @if( $user->name  === '' || $user->name  === null)
                                <span class="placeholder" data-placeholder="Full Name"></span>
                                @endif
                               
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <input type="tel" class="form-control" id="phone" value="{{ $user->phone}}">
                                
                                @if( $user->phone  === '' || $user->phone  === null)
                                <span class="placeholder" data-placeholder="Phone number"></span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" value="{{ $user->email}}" readonly>
                            </div>


                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Egypt</option>
                                    <option value="2">United Arab Emirates</option>
                                </select>
                            </div>

                            
                            <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" value="{{ $user->address}}">
                                @if( $user->address  === '' || $user->address  === null)
                                <span class="placeholder" data-placeholder="Address line"></span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city">
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Cairo</option>
                                    <option value="2">Alexandria</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" placeholder="Postcode/ZIP">
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                </div>
                                <textarea class="form-control" id="note" rows="2" placeholder="Order Notes"></textarea>
                            </div>
                        </form>
                    </div>
                 

                    <div class="col-lg-4">


 <form class="row contact_form" action="" method="post" novalidate="novalidate" id="payment-form">
@csrf
<input type="hidden" name="name" value="" id="name_fetch">
<input type="hidden" name="email" value="" id="email_fetch">
<input type="hidden" name="phone" value="" id="phone_fetch">
<input type="hidden" name="address" value="" id="address_fetch">
<input type="hidden" name="post_code" value="" id="post_fetch">
<input type="hidden" name="note" value="" id="note_fetch">

                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a>Product<span class="middle">x Qty</span><span>Price</span></a></li>

                                @foreach(Cart::content() as $item)
                                <li><a href="/shop/product/details/{{$item->id}}">{{Illuminate\Support\Str::limit($item->name, 10, '...')}} <span class="middle">x {{$item->qty}}</span> <span class="last">${{$item->price}}</span></a></li>

                                @endforeach

                           
                            </ul>
                            <ul class="list list_2">

                                <li><a href="#">Total
                                <span class="middle">x {{ Cart::count() }}</span>
                                 <span>${{ Cart::subtotal() }}</span></a></li>
                            </ul>

                            
                            <div class="payment_item">

                    <p style="margin-top: 7px;">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                
                                <div class="radion_btn">
                                    <input type="radio" id="option1" name="selector">
                                    <label for="option1">Delivery </label>
                                    <div class="check"></div>
                                </div>

                            </div>
                            <div class="payment_item"style="" >
                                <div class="radion_btn">
                                    <input type="radio" id="option2" name="selector">
                                    <div class="list"></div>
                                    <label for="option2">Stripe </label>
                                    <img src="{{ asset('frontend/main_assets/img/product/card.jpg') }}" alt="">
                                    <div class="check"></div>
                                </div>

                                <div hidden id="card-element">
                                </div>

                                <div id="card-errors" role="alert">
                                </div>

                    

                            </div>
                            <div style="margin-top: 15px;" class="creat_account">
                                <input type="checkbox" id="option3" name="selector">
                                <label for="option3">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <a hidden type="submit" id="process_btn" class="primary-btn" href="#">Proceed to Paypal</a>

                    
                        </div>

                    </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@include('frontend.body.footer')
@include('frontend.body.cart')

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    $('.nav.navbar-nav.navbar-right').hide();
</script>



<script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>

<script src="{{ asset('frontend/extra/payment/script.js') }}"></script>

<script type="text/javascript">

// Wait for the page to load
document.addEventListener("DOMContentLoaded", function() {
    // Your JavaScript code here

    // Get references to the radio buttons and the card elements del_note strip_note
    var option1 = document.getElementById('option1');
    var option2 = document.getElementById('option2');

    var cardElement = document.getElementById('card-element');
    var cardErrors = document.getElementById('card-errors');

    // Get a reference to the element with the id "process_btn"
    var processBtn = document.getElementById('process_btn');
    // Function to toggle card elements based on the selected radio button
    function toggleCardElements() {
       

        if (option1.checked) {
            processBtn.removeAttribute('hidden'); 
            cardElement.setAttribute('hidden', 'true');

            // Change the text content to "Proceed to Delivery"
            processBtn.textContent = 'Proceed to Delivery';
        }else if (option2.checked) {
            // If "Stripe" is selected, show the card-element and hide card-errors
            processBtn.removeAttribute('hidden'); 
            cardElement.removeAttribute('hidden');
            cardErrors.setAttribute('hidden', 'true');
           
            // Change the text content to "Proceed to Stripe"
            processBtn.textContent = 'Proceed to Stripe';
        }
    }

    // Add event listeners to all radio buttons
    option1.addEventListener('change', toggleCardElements);
    option2.addEventListener('change', toggleCardElements);

    // Initialize based on the default selected radio button
    // toggleCardElements();

    var obj1 = document.getElementById('name');
    var obj2 = document.getElementById('phone');
    var obj3 = document.getElementById('email');
    var obj4 = document.getElementById('address');
    var obj5 = document.getElementById('zip');
    var obj6 = document.getElementById('note');

    var ob1 = document.getElementById('name_fetch');
    var ob2 = document.getElementById('phone_fetch');
    var ob3 = document.getElementById('email_fetch');
    var ob4 = document.getElementById('address_fetch');
    var ob5 = document.getElementById('post_fetch');
    var ob6 = document.getElementById('note_fetch');

    ob1.value = obj1.value;
    ob2.value = obj2.value;
    ob3.value = obj3.value;
    ob4.value = obj4.value;
    ob5.value = obj5.value;
    ob6.value = obj6.value;

    obj1.addEventListener('input', changer);
    obj2.addEventListener('input', changer);
    obj3.addEventListener('input', changer);
    obj4.addEventListener('input', changer);
    obj5.addEventListener('input', changer);
    obj6.addEventListener('input', changer);

    function changer() {

    ob1.value = obj1.value;
    ob2.value = obj2.value;
    ob3.value = obj3.value;
    ob4.value = obj4.value;
    ob5.value = obj5.value;
    ob6.value = obj6.value;

    }
///////////////////


// Create a Stripe client.
var stripe = Stripe('{{ $seo->Stripe_Publishable_Key }}');
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

    var paymentForm = document.getElementById("payment-form");

    processBtn.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link behavior

        // Check the content of the process button
        if (processBtn.textContent.trim() === "Proceed to Stripe") {
            console.log("stripe");
          paymentForm.action = "{{ route('stripe.order') }}";


                 create_req();


        } else if (processBtn.textContent.trim() === "Proceed to Delivery") {
            console.log("devlivery");
           
            paymentForm.action = "{{ route('cash.order') }}";
            var form = document.getElementById('payment-form');
            form.submit();
        }


    });


function create_req(){
    stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
}

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}

});

</script>





</body>

</html>