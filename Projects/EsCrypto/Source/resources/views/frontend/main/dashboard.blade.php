@extends('frontend.main.index')
@section('dashboard')

<div class="card mb-3">
<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
</div>

            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Welcome To {{session('Seo')->meta_title}}</h3>
                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">Easy & Simple</li>
                              <li style="font-size: 0.8rem;">Instant Earn Multi Crypto to your FaucetPay</li>
                          </p>
                      </ul>
                </div>
              </div>
            </div>
          </div>
<!--  -->
          <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe data-aa='2306704' src='//ad.a-ads.com/2306704?size=728x90' style='width:728px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

            </div>
          </div>

<!--  -->
          <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe src='//ads.coinserom.com/publisher?adsunit=323737&serom=3135313931&size=728x90' style='width:728px;height:90px;border:0px;padding:0;background-color: transparent;overflow: auto;'>
</iframe>
            </div>
          </div>
<!--  -->
          <div class="card mb-3">
<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
</div>

            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Frequently Asked Questions</h3>
              </div>
            </div>
          </div>

<!--  -->
                  <div class="card-header p-0" id="faqAccordionHeading1">
                    <button style="background-color: transparent;" class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion1" aria-expanded="false" aria-controls="collapseFaqAccordion1"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">How long does it take to get my money to my wallet?</span></button>
                  </div>
                  <div class="collapse bg-light" id="collapseFaqAccordion1" aria-labelledby="faqAccordionHeading1" data-parent="#accordionFaq">
                    <div class="card-body">

                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">FaucetPay : All Claims & Withdrawals are processed instantly.</li>
                              <li style="font-size: 0.8rem;">Account Wallet : reach minimum Payout limit request approved after 24Hr.</li>
                          </p>
                      </ul>

                    </div>
                  </div>
<!--  -->

                  <div class="card-header p-0" id="faqAccordionHeading2">
                    <button style="background-color: transparent;" class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion2" aria-expanded="false" aria-controls="collapseFaqAccordion2"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">I cant login to my account?</span></button>
                  </div>
                  <div class="collapse bg-light" id="collapseFaqAccordion2" aria-labelledby="faqAccordionHeading2" data-parent="#accordionFaq">
                    <div class="card-body">
                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">Please clear your browser browsing history, cookies & site data, cached images & files</li>
                          </p>
                      </ul>
                    </div>
                  </div>
<!--  -->

                  <div class="card-header p-0" id="faqAccordionHeading3">
                    <button style="background-color: transparent;" class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion3" aria-expanded="false" aria-controls="collapseFaqAccordion3"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">I didn't do anything wrong. Why am I banned?</span></button>
                  </div>
                  <div class="collapse bg-light" id="collapseFaqAccordion3" aria-labelledby="faqAccordionHeading3" data-parent="#accordionFaq">
                    <div class="card-body">
                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">Account bans are only applied if you did something against our Terms of Service. If you are sure that it is a mistake, please feel free to contact us and explain the situation</li>
                          </p>
                      </ul>
                    </div>
                  </div>

<!--  -->

                  <div class="card-header p-0" id="faqAccordionHeading4">
                    <button style="background-color: transparent;" class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion4" aria-expanded="false" aria-controls="collapseFaqAccordion4"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Can I use VPN/Proxy?</span></button>
                  </div>
                  <div class="collapse bg-light" id="collapseFaqAccordion4" aria-labelledby="faqAccordionHeading4" data-parent="#accordionFaq">
                    <div class="card-body">
                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">Unfortunately, you cannot use any proxied connection</li>
                          </p>
                      </ul>
                    </div>
                  </div>

<!--  -->


                  <div class="card-header p-0" id="faqAccordionHeading5">
                    <button style="background-color: transparent;" class="accordion-button btn btn-link text-decoration-none d-block w-100 py-2 px-3 collapsed border-0 text-start" data-bs-toggle="collapse" data-bs-target="#collapseFaqAccordion5" aria-expanded="false" aria-controls="collapseFaqAccordion5"><span class="fas fa-caret-right accordion-icon me-3" data-fa-transform="shrink-2"></span><span class="fw-medium font-sans-serif text-900">Can I create multiple accounts?</span></button>
                  </div>
                  <div class="collapse bg-light" id="collapseFaqAccordion5" aria-labelledby="faqAccordionHeading5" data-parent="#accordionFaq">
                    <div class="card-body">
                      <ul class="bullet-inside ps-0">
                          <p class="fs--1 mb-0">
                              <li style="font-size: 0.8rem;">No, we do not allow multiple account usage. Our advanced security system automatically bans accounts that are owned by the same person</li>
                          </p>
                      </ul>
                    </div>
                  </div>
                </div>

@auth
@else

                   <form method="POST" action="{{ route('login') }}" role="form">
                @csrf


          <div class="card mb-3 login">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">login | FaucetPay Email</h5>
                </div>
              </div>
            </div>
            <div class="card-body bg-light">
              <div class="tab-content">
<p class="mb-0">New User : Insert Faucetpay Email, With Random Password to secure your account in {{session('Seo')->meta_title}}.</p>

<br>
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324">
                  <form>



                    <div class="mb-3">
                      <label class="form-label text-start" for="email">Email address</label>
                      <input class="form-control" id="email" name="email" type="email"/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-end" for="password">Password</label>
                      <input class="form-control" name="password" id="password" type="password"/>
                    </div>

<div class="text-center">
  <div class="mb-3 cf-turnstile"
                 data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
                 data-callback="onTurnstileSuccess"
    ></div>

<button class="btn btn-primary enter_load d-none" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Please wait...
</button>


 <button class="btn btn-primary text-center enter d-none" type="submit" name="submit">Enter</button>

</div>



                  </form>
                </div>
              </div>
            </div>
          </div>
  </form>

@endauth






 <div class="card mt-3">
            <div class="card-header border-bottom">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="mb-0" id="followers">Currencies Supported <span class="d-none d-sm-inline-block">(13)</span></h5>
                </div>
              </div>
            </div>
            <div class="card-body bg-light px-1 py-0">
              <div class="row g-0 text-center fs--1">

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">


          
         
        


                  <div class="bg-white dark__bg-1100 p-3 h-100"><a>
<img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/btc.png') }}" width="50" />
<img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/bch.png') }}" width="50" />

                  </a>
                    <h6 class="mb-1"><a>BTC/BCH</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">BITCOIN / BITCOIN CASH</a></p>

                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/ltc.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>LTC</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">LITECOIN</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/doge.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>DOGE</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">DOGECOIN</a></p>

                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/trx.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>TRX</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">TRON</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/bnb.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>BNB</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">BINANCE BNB</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/dash.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>DASH</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">DASH</a></p>

                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/dgb.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>DGB</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">DIGIBYTE</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/eth.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>ETH</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">Ethereum</a></p>

                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/fey.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>FEY</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">Feyorra</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/sol.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>SOL</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">SOLANA</a></p>

                  </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/usdt.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>USDT</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">Tether</a></p>

                  </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                  <div class="bg-white dark__bg-1100 p-3 h-100"><a><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('frontend/assets/img/cryptos/zec.png') }}" width="50" /></a>
                    <h6 class="mb-1"><a>ZEC</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700">ZCASH</a></p>

                  </div>
                </div>

              </div>
            </div>
          </div>

  <br>



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

          
 <div class="card mb-3">

            <div class="card-header border-bottom">
              <div class="row flex-between-end">

                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Payment Proves : Latest <code>20</code></h5>

                </div>
                

              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel">
                  <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Email</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Payout</th>
                          <th scope="col">Status</th>
                          <th class="text-end" scope="col">Time</th>
                        </tr>
                      </thead>
                      <tbody>

@foreach($payments as $key => $payment)

@if(ucfirst($payment->operation) == 'Faucetpay')

                        <tr class="align-middle">

                          <td class="text-nowrap">{{$payment->id}}</td>

                          <td class="text-nowrap">
                            <div class="d-flex align-items-center">
                              <div class="avatar avatar-xl">

    <div class="avatar-name rounded-circle"><span>{{ Illuminate\Support\Str::limit($payment->email, 2, '') }}</span></div>

                              </div>
<div class="ms-2">
    @php
        echo strlen($payment->email) > 13 ? substr($payment->email, 0, 7) . '...' : $payment->email;
    @endphp
</div>
                            </div>
                          </td>


                          <td class="text-nowrap">{{$payment->amount}}{{$payment->type}}</td>

<td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">{{ucfirst($payment->operation)}}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
</td>

<td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                          </td>


                          <td class="text-end">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->diffForHumans() }}</td>

                        </tr>

@endif
@endforeach


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0" data-anchor="data-anchor">Analizer</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">

<div class="col-6 col-md-4 col-xl mb-4 text-center">
                  <span class="fs-4 fw-medium" data-countup='{"endValue":{{$users}}}'>0</span>
                  <h6>Total User's</h6>
</div>



<div class="col-6 col-md-4 col-xl mb-4 text-center">
    <span class="fs-4 fw-medium" data-countup='{"endValue": 
    {{ \Illuminate\Support\Facades\DB::table('users')
    ->where('last_seen', '>=', now()->subMinutes(2))
    ->count() }}, "duration": 10}'>0</span>
    <h6>Total Online</h6>
</div>



<div class="col-6 col-md-4 col-xl mb-4 text-center">
    @php
        $totalPaid = session('Seo')->total_paid;
    @endphp
    <span class="fs-4 fw-medium">{{ number_format($totalPaid, 2) }} $</span>
    <h6>Total Paid</h6>
</div>






<div class="col-6 col-md-4 col-xl mb-4 text-center">
    @php
            // Initialize the total days counter
            $totalDays = 1;

            // Get the timestamp of the record's creation date
            $createdAtTimestamp = $seo->created_at;

            // Calculate the difference in days between the creation date and now
            $daysDifference = now()->diffInDays($createdAtTimestamp);

            // Increment the total days counter
            $totalDays += $daysDifference;

    @endphp

    <span class="fs-4 fw-medium" data-countup='{"endValue": {{ $totalDays }}, "duration": 10}'>0</span>
    <h6>Total Days</h6>
</div>




              </div>

            </div>
          </div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        $('.enter').on('click', function() {
            $('.enter').addClass('d-none');
            $('.enter_load').removeClass('d-none');
            // $('.login').addClass('d-none');

        });

      });

    window.onTurnstileSuccess = function (code) {
      $('.enter').removeClass('d-none');
    }

</script>



@endsection