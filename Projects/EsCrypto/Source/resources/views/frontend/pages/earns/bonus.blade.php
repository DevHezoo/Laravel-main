
@extends('frontend.main.index')
@section('bonus')




        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>


            <div class="card-body position-relative">




<form method="POST" action="{{ route('bonus.claim') }}" role="form">
    @csrf
              <div class="row">

                <div class="col-lg-8">
                  <h3>Daily Bonus</h3>
                </div>

            <div class="card-body">
              <div class="alert alert-warning p-4 mb-0" role="alert">
                <div class="d-flex"><span class="fab fa-intentionally-kept fs-3"></span>
                  <div class="flex-1 ms-3">
                    <h4 class="alert-heading">Claim Bonus Requirements</h4>

                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">Faucet Claims : {{ session('FaucetClaimed') }}/{{ session('FaucetLimit') }}</li>
                              <li style="font-size: 0.8rem;">Shortlink Claims : {{session('TodayVisited')}}/{{session('TotalShortlink')}}</li>
                          </p>
                      </ul>


                  </div>
                </div>
              </div>
            </div>


@if(session('FaucetClaimed') >= session('FaucetLimit') && session('TodayVisited') >= session('TotalShortlink') && !Carbon\Carbon::parse(auth()->user()->claimed)->isToday())

                <div class="text-center mb-3 cf-turnstile"
                 data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
                 data-callback="onTurnstileSuccess"
            ></div>

    <button class="btn btn-primary d-none claim" type="submit">
        Claim<span class="fas fa-gift" data-fa-transform="shrink-3"></span>
    </button>
@endif


      </div>

</form>


        
            </div>
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



<script>
    $(document).ready(function() {
        $('.claim').on('click', function() {
            $(this).addClass('d-none');
        });
    });

    window.onTurnstileSuccess = function (code) {
      $('.claim').removeClass('d-none');
    }
    
</script>


@endsection