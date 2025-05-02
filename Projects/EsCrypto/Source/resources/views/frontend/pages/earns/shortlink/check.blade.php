@extends('frontend.main.index')
@section('check')


<!-- Redirection Counter -->
<script type="text/javascript">
  var count = 17; // Timer
  var redirect = "/shortlink/{{ strtolower(session('PageUnit')) }}"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "Checker " + count + " seconds left."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
        $('.checked').removeClass('d-none');
        timer.innerHTML = "Checker Done."; // Timer Message
        $('.s1').html("Completed");
        $('.s2').html("Connected");
        
        setTimeout(function() {
                window.location.href = redirect;
        }, 1500);
    }
  }
</script>



        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>


            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">

                  <h3 class="s1">Loading..</h3>
                </div>


            <div class="card-body">
              <div class="alert alert-warning p-4 mb-0" role="alert">
                <div class="d-flex"><span class="fab fa-intentionally-kept fs-3"></span>
                  <div class="flex-1 ms-3">
                    <h4 class="alert-heading s2">Connecting..</h4>
        





            <ul class="bullet-inside ps-0">
                <p class="fs--1 mb-0">
    <li style="font-size: 0.8rem;" id="timer"></li>
                </p>
            </ul>

        <script type="text/javascript">
          countDown();
        </script>
      </p>

                  </div>
                </div>
              </div>
            </div>


              </div>


            </div>
        </div>


<div class="checked d-none">

@if(session()->has('Status'))
@if(session('Status') === 1)
<div class="alert alert-success border-2 d-flex align-items-center" role="alert">
    <div class="bg-success me-3 icon-item">
        <span class="fas fa-check-circle text-white fs-3"></span>
    </div>
    <p class="mb-0 flex-1">
        {{ session('ShortlinkCryptoAmount') }} {{ strtoupper(session('PageUnit')) }} has been added to your
        @if(session('User')->payout == 'faucetpay')
            Faucetpay
        @else
            Wallet
        @endif
    </p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('Status') === 2)
<div class="alert alert-success border-2 d-flex align-items-center" role="alert">
    <div class="bg-success me-3 icon-item">
        <span class="fas fa-check-circle text-white fs-3"></span>
    </div>
    <p class="mb-0 flex-1">
    {{ session('ShortlinkUsdAmount') }}$ has been added to your account
    </p>

    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('Status') === 3)
<div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
  <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
  <p class="mb-0 flex-1">Invalid User Access Token</p>
  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('Status') === 4)
<div class="alert alert-warning border-2 d-flex align-items-center" role="alert">
    <div class="bg-success me-3 icon-item">
        <span class="fas fa-check-circle text-white fs-3"></span>
    </div>
    <p class="mb-0 flex-1">
        The faucet does not have sufficient funds
    </p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('Status') === 5)
<div class="alert alert-warning border-2 d-flex align-items-center" role="alert">
  <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-3"></span></div>
  <p class="mb-0 flex-1">Already Claimed</p>
  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@php
    Session::forget('Status');
@endphp
@endif
@endif

</div>



          <div class="card mb-3">
                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe data-aa='2306704' src='//ad.a-ads.com/2306704?size=728x90' style='width:728px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

            </div>
          </div>
          
          <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe src='//ads.coinserom.com/publisher?adsunit=323737&serom=3135313931&size=728x90' style='width:728px;height:90px;border:0px;padding:0;background-color: transparent;overflow: auto;'>
</iframe>
            </div>
          </div>
          
                    <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<script type="text/javascript">
    atOptions = {
        'key' : '4c407329270ac3120da649058b5b33cf',
        'format' : 'iframe',
        'height' : 60,
        'width' : 468,
        'params' : {}
    };
    document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/4c407329270ac3120da649058b5b33cf/invoke.js"></scr' + 'ipt>');
</script>

            </div>
          </div>

<!-- Add these links in the <head> section of your HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Include jQuery before this script if not already included -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
       document.addEventListener('DOMContentLoaded', function () {
        $('.visit').on('click', function() {
            $('.visit').addClass('d-none');
        });
      });
</script>


@endsection
