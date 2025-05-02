@extends('frontend.main.index')
@section('starting')




        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>


            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Getting Started</h3>
                </div></div>
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
            <div class="card-header">

              <h5 class="mb-0">Earn Methods <code>Updated: ({{date("d/m/Y", strtotime(session('Seo')->updated_at))}})</code></h5>
            </div>
            <div class="card-body bg-light">

      <div class="alert alert-warning"><span class="fw-black text-black">Faucet</span> Claim every x Seconds, Many Crypto Units, Limits {{session('Seo')->faucet_limit}} per day.</div>
      <div class="alert alert-warning"><span class="fw-black text-black">Shortlink</span> Claim Available Links, Many Crypto Units, Limits {{session('VisitCount')}} per day.</div>



<h3 class="text-center"><span class="fw-black text-black">Available Crypto</span></h3>
<!--  -->


       <div class="table-responsive">
                <table class="table text-center table-bordered">
                  <thead class="bg-300 font-sans-serif">
                    <tr>
                      <th class="text-nowrap">Unit</th>
                      <th>Claim Duration Every X Seconds</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td class="text-nowrap"><code>BTC</code></td>
                      <td>{{session('Seo')->timer_btc}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>LTC</code></td>
                      <td>{{session('Seo')->timer_ltc}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>DOGE</code></td>
                      <td>{{session('Seo')->timer_doge}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>TRX</code></td>
                      <td>{{session('Seo')->timer_trx}}</td>
                    </tr>


                    <tr>
                      <td class="text-nowrap"><code>BNB</code></td>
                      <td>{{session('Seo')->timer_bnb}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>BCH</code></td>
                      <td>{{session('Seo')->timer_bch}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>DASH</code></td>
                      <td>{{session('Seo')->timer_dash}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>DGB</code></td>
                      <td>{{session('Seo')->timer_dgb}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>ETH</code></td>
                      <td>{{session('Seo')->timer_eth}}</td>
                    </tr>


                    <tr>
                      <td class="text-nowrap"><code>FEY</code></td>
                      <td>{{session('Seo')->timer_fey}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>SOL</code></td>
                      <td>{{session('Seo')->timer_sol}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>USDT</code></td>
                      <td>{{session('Seo')->timer_usdt}}</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>ZEC</code></td>
                      <td>{{session('Seo')->timer_zec}}</td>
                    </tr>

                  </tbody>
                </table>
              </div>
         



            <!--  -->

<h3 class="text-center"><span class="fw-black text-black">More Informations</span></h3>

<!--  -->


       <div class="table-responsive">
                <table class="table text-center table-bordered">
                  <thead class="bg-300 font-sans-serif">
                    <tr>
                      <th class="text-nowrap">Unit</th>
                      <th>About</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td class="text-nowrap"><code>Referral Bonus</code></td>
                      <td>{{session('Seo')->referral_bonus}}% for (every Claim/Single user) adding into your wallet balance.</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>Minimum Wallet Withdrawal Request</code></td>
                      <td>{{session('Seo')->wallet_min_withdraw}}$</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>Faucet Claim Value</code></td>
                      <td>{{session('Seo')->faucet_usd}}$</td>
                    </tr>

                    <tr>
                      <td class="text-nowrap"><code>Shortlink Claim Value</code></td>
                      <td>{{session('Seo')->shortlink_usd}}$</td>
                    </tr>


                  </tbody>
                </table>
              </div>
         



            <!--  -->










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


@endsection