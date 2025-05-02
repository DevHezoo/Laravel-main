@extends('frontend.main.index')
@section('settings')

          <div class="row">
            <div class="col-12">


              <div class="card mb-3 btn-reveal-trigger">

                <div class="card-header position-relative min-vh-25 mb-8">
                  <div class="cover-image">

<div class="bg-holder rounded-3 rounded-bottom-0" 
style="background-image:url({{ asset('frontend/assets/img/profile.jpg') }});">

                    <input class="d-none" id="upload-cover-image" type="file" />
                  </div>


                  <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> 

                        <img src="{{ asset('frontend/assets/img/user.png') }}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />




                    </div>
                  </div>
                </div>
              </div>

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-1"> 
                    {{ Illuminate\Support\Str::before(auth()->user()->email, '@') }}

<span data-bs-toggle="tooltip" data-bs-placement="right" title="Account Created : {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->diffForHumans() }}">
    @if(Carbon\Carbon::now()->diffInDays(auth()->user()->created_at) > 1)
        <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
    @else
        <small class="fa fa-check-circle text-default" data-fa-transform="shrink-4 down-2"></small>
    @endif
</span>

</h4>

<h5 class="fs-0 fw-normal">Welcome To {{session('Seo')->meta_title}}.</h5>


<p class="text-500">Invites: {{ count(session('Invited')) }} User's | Get 3% Commission</p>


                </div>




              </div>
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
          











          <div class="row g-0">
            
     


            <div class="col-lg-8 pe-lg-2">

              <div class="card mb-3">
                <div class="card-header">
            <h5 class="mb-0">Profile Information</h5>
                </div>


                <div class="card-body bg-light">




                <form class="row g-3">


                @if(!empty(auth()->user()->invited_by))
    <h5 style="text-align: center; line-height: 2; color: #2c7be5;" class="mb-0">Invited By : {{ Illuminate\Support\Str::before(auth()->user()->invited_by, '@') }}</h5>
@endif

                    <div class="col-lg-6">
                      <label class="faucetpay_email" for="faucetpay_email">Faucetpay Email</label>
                      <input class="form-control" id="faucetpay_email" name="email" type="email" value="{{ auth()->user()->email }}" readonly />
                    </div>


<div class="col-lg-6">
    <label class="faucetpay_email" for="faucetpay_email">Withdrawal Balance</label>

    <div class="input-group col-lg-6">

        <?php
        $balance = number_format(auth()->user()->balance, 12);
        $balance_parts = explode('.', $balance);
        $before_decimal = $balance_parts[0];
        $after_decimal = isset($balance_parts[1]) ? $balance_parts[1] : '';
        ?>
        <input class="form-control" type="text" aria-label="Amount (to the nearest dollar)" value="{{ $before_decimal }}" readonly />
        <span class="input-group-text">.{{ $after_decimal }}</span>
                <span class="input-group-text">$</span>
    </div>
</div>


<div class="col-lg-12">
    <label class="faucetpay_email" for="faucetpay_email">My Referral Link</label>
    <input class="form-control text-center" id="faucetpay_email" value="{{ url(session('Seo')->meta_website . '/?ref=' . auth()->user()->verify) }}" readonly />
</div>

                    
                  </form>
                </div>
              </div>



@if(session('User')->payout=='wallet')
<div class="card mb-3 parent_withdrawl">
    <div class="card-header">
        <h5 class="mb-0">Crypto Withdrawals</h5>
    </div>

    <div class="card-body bg-light">
<form class="row g-3" action="{{ route('request.payout') }}" method="POST">
    @csrf
            <div class="col-lg-12">

@php
$latestRequest = \App\Models\Requests::where('email', auth()->user()->email)->latest()->first();
@endphp

@if($latestRequest && $latestRequest->status == 'Pending')
<h5 style="text-align: center; line-height: 2; color: #f8b547;" class="mb-0">Last Withdrawal : In the queue for processing</h5>


@elseif($latestRequest && $latestRequest->status == 'Completed')
<h5 style="text-align: center; line-height: 2; color: #34c02e;" class="mb-0">Last Withdrawal : Completed</h5>

@else
<h5 style="text-align: center; line-height: 2;" class="mb-0">Last Withdrawal : No Data</h5>
@endif

<br>


                <label class="faucetpay_email" for="faucetpay_email">Crypto Unit</label>

<div class="btn-group dropup">
  <button class="btn dropdown-toggle mb-2 btn-success" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="cryptoUnitDropdown">
    <span id="selectedCryptoUnit">List</span>
  </button>
  <div class="dropdown-menu form-control">
<a style="cursor: pointer;" class="dropdown-item" data-wallet="LTC">LTC</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="DOGE">DOGE</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="TRX">TRX</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="BNB">BNB</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="BCH">BCH</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="DASH">DASH</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="DGB">DGB</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="ETH">ETH</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="FEY">FEY</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="SOL">SOL</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="USDT">USDT</a>

<a style="cursor: pointer;" class="dropdown-item" data-wallet="ZEC">ZEC</a>
  <div class="dropdown-divider"></div>
<a style="cursor: pointer;" class="dropdown-item" data-wallet="BTC">BTC</a>

  </div>
</div>

            </div>

    <!-- Hidden input to store the selected crypto unit -->
    <input hidden name="payout_type" id="selectedCryptoUnitInput">

            <div id="walletLabel" class="col-lg-12">
                <label for="wallet_address">Wallet Address</label>
                <input name="payout_address" class="form-control col-9 col-sm-7 mb-3 disable" id="wallet_address"/>

    <div class="text-center mb-3 cf-turnstile"
            data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}">
    </div>

<button class="btn btn-success col-6 col-sm-6 offset-3 d-none request_load" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Request...
</button>


@if(session('Seo')->wallet_min_withdraw <= auth()->user()->balance)
    <button class="btn btn-success col-6 col-sm-6 offset-3 request" type="submit">
        Request Payout
    </button>
@else
<button class="btn btn-success col-6 col-sm-6 offset-3" disabled="disabled" type="submit">
    Request Payout
</button>
@endif

            </div>

        </form>
    </div>
</div>
@elseif(auth()->user()->payout=='other')
<div class="card mb-3 parent_withdrawl">
    <div class="card-header">
        <h5 class="mb-0">Other Withdrawals</h5>
    </div>


    <div class="card-body bg-light">

<form class="row g-3" action="{{ route('request.payout') }}" method="POST">
    @csrf
            <div class="col-lg-12">

@php
$latestRequest = \App\Models\Requests::where('email', auth()->user()->email)->latest()->first();
@endphp

@if($latestRequest && $latestRequest->status == 'Pending')
<h5 style="text-align: center; line-height: 2; color: #f8b547;" class="mb-0">Last Withdrawal : In the queue for processing</h5>


@elseif($latestRequest && $latestRequest->status == 'Completed')
<h5 style="text-align: center; line-height: 2; color: #34c02e;" class="mb-0">Last Withdrawal : Completed</h5>

@else
<h5 style="text-align: center; line-height: 2;" class="mb-0">Last Withdrawal : No Data</h5>
@endif

<br>

                <label class="faucetpay_email" for="faucetpay_email">Crypto Unit</label>


<div class="btn-group dropup">
  <button class="btn dropdown-toggle mb-2 btn-success" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="cryptoUnitDropdown">
    <span id="selectedCryptoUnit">List</span>
  </button>
  <div class="dropdown-menu form-control">
<a style="cursor: pointer;" class="dropdown-item" data-wallet="Sim's Cash">Vod/.. Cash</a>
  <div class="dropdown-divider"></div>
<a style="cursor: pointer;" class="dropdown-item" data-wallet="Payeer">Payeer</a>

  </div>
</div>


            </div>

    <!-- Hidden input to store the selected crypto unit -->
    <input hidden name="payout_type" id="selectedCryptoUnitInput">


            <div id="walletLabel" class="col-lg-12">
        <label for="wallet_address">Wallet Address</label>
        <input name="payout_address" class="form-control col-9 col-sm-7 mb-3 disable" id="wallet_address"/>

<button class="btn btn-success col-6 col-sm-6 offset-3 d-none request_load" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Request...
</button>

@if($seo->wallet_min_withdraw <= auth()->user()->balance)
    <button class="btn btn-success col-6 col-sm-6 offset-3 request" type="submit">
        Request Payout
    </button>
@else
<button class="btn btn-success col-6 col-sm-6 offset-3" disabled="disabled" type="submit">
    Request Payout
</button>
@endif

            </div>
        </form>
    </div>
</div>
@endif


            </div>



            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                <div class="card mb-3 overflow-hidden">
                  <div class="card-header">
                    <h5 class="mb-0">Payout Settings</h5>
                  </div>
                  <div class="card-body bg-light">
                    <h6 class="fw-bold">Payout Operation ?<span class="fs--2 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Payout Process Operation System."><span class="fas fa-question-circle"></span></span></h6>
                    
                    <div class="ps-2">


<form id="payoutForm" action="{{ route('update.payout') }}" method="POST">
    @csrf

    <div class="form-check mb-0 lh-1">
        <input @if(auth()->user()->payout == "faucetpay") checked @endif class="payout_operation" type="radio" value="faucetpay" id="faucet" name="payout-type" />
        <label class="form-check-label mb-0" for="faucet">Faucetpay Networks</label>
        <span class="fs--2 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="0 Fees / Instant Payout."><span class="fas fa-question-circle"></span></span>
    </div>

    <div style="margin-top: 4px;margin-bottom: 4px;" class="border-dashed-bottom my-2"></div>

    <div class="form-check mb-0 lh-1">
        <input @if(auth()->user()->payout == "wallet") checked @endif class="payout_operation" type="radio" value="wallet" id="wallet" name="payout-type" />
        <label class="form-check-label mb-0" for="wallet">Crypto Wallet Address</label>
        <span class="fs--2 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Please be aware that a network transfer fee will be deducted from your balance. This fee is imposed by the network operations and is beyond our control. Thank you for your understanding."><span class="fas fa-question-circle"></span></span>
    </div>

    <div class="form-check mb-0 lh-1">
        <input @if(auth()->user()->payout == "other") checked @endif class="payout_operation" type="radio" value="other" id="other" name="payout-type" />
        <label class="form-check-label mb-0" for="other">More Networks</label>
        <span class="fs--2 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Please be aware that a network transfer fee will be deducted from your balance. This fee is imposed by the network operations and is beyond our control. Thank you for your understanding."><span class="fas fa-question-circle"></span></span>
    </div>
</form>


                    </div>


  

                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                  </div>
                  <div class="card-body bg-light">


<form method="POST" action="{{ route('user.profile.update.password') }}">
    @csrf <!-- Add this to include the CSRF token -->

    <div class="mb-3">
        <label class="form-label" for="old_password">Old Password</label>
        <input class="form-control" id="old_password" name="old_password" type="password" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="new_password">New Password</label>
        <input class="form-control" id="new_password" name="new_password" type="password" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="confirm_password">Confirm Password</label>
        <input class="form-control" id="confirm_password" name="new_password_confirmation" type="password" />
    </div>


<button class="btn btn-primary w-100 password_load d-none" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Update Request...
</button>

    <button class="btn btn-primary d-block w-100 password" type="submit">Update</button>


</form>


                  </div>
                </div>

              </div>
            </div>
          </div>
          </div>
  </div>
  <br>
 <div class="card mb-3">

            <div class="card-header border-bottom">
              <div class="row flex-between-end">


                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">My Requests : Latest <code>20</code></h5>

                </div>
                
                <div class="col-auto align-self-center">
                  <p class="mb-0 mt-2 mb-0">Total : <code>{{count(session('RequestsPayout'))}}</code> Requests</p>
                </div>


              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-312a89cb-2fd5-4046-8ae2-510e67420d0a" id="dom-312a89cb-2fd5-4046-8ae2-510e67420d0a">
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


@foreach($requests as $key => $request)



                        <tr class="align-middle">

                          <td class="text-nowrap">{{$request->id}}</td>

                          <td class="text-nowrap">
                            <div class="d-flex align-items-center">
                              <div class="avatar avatar-xl">

    <div class="avatar-name rounded-circle"><span>{{ Illuminate\Support\Str::limit($request->email, 2, '') }}</span></div>

                              </div>
<div class="ms-2">
    @php
        echo strlen($request->email) > 13 ? substr($request->email, 0, 13) . '...' : $request->email;
    @endphp
</div>
                            </div>
                          </td>


                          <td class="text-nowrap">{{$request->balance}}$</td>

<td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">{{ucfirst($request->type)}}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
</td>


<td>
    @if(ucfirst($request->status) == 'Pending')
        <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">{{ucfirst($request->status)}}<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
    @elseif(ucfirst($request->status) == 'Completed')
        <span class="badge badge rounded-pill d-block p-2 badge-soft-success">{{ucfirst($request->status)}}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
    @elseif(ucfirst($request->status) == 'Cancelled')
        <span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">{{ucfirst($request->status)}}<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
    @endif
</td>




                          <td class="text-end">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->diffForHumans() }}</td>

                        </tr>


@endforeach


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $('#walletLabel').hide(); // Unhide the div
    $(document).ready(function () {
        // Set default crypto unit to "List"
        var defaultCryptoUnit = 'List';
        $('#selectedCryptoUnit').text(defaultCryptoUnit);
        $('#wallet_address').val(defaultCryptoUnit); // Optionally clear the wallet address input

        // Handle crypto unit selection
        $('.dropdown-item').on('click', function () {
            var selectedCryptoUnit = $(this).data('wallet');
            $('#selectedCryptoUnit').text(selectedCryptoUnit);
            $('#walletLabel').show(); // Unhide the div
            $('#walletLabel label').text(selectedCryptoUnit + ' Address');
            $('#wallet_address').val(''); // Optionally clear the wallet address input
            $('#selectedCryptoUnitInput').val(selectedCryptoUnit);
        });


    // Submit the form when a radio button is clicked
    $('input[name="payout-type"]').on('click', function () {
        $('#payoutForm').submit();
    });


        $('.password').on('click', function() {

            $('.password').addClass('d-none');
            $('.password_load').removeClass('d-none');

            $('#old_password').prop('disabled', true);
            $('#new_password').prop('disabled', true);
            $('#confirm_password').prop('disabled', true);

            $('.payout_operation').prop('disabled', true);

            $('.request').addClass('d-none');
            $('.request_load').removeClass('d-none');
            $('.dropdown-toggle').prop('disabled', true);
            $('.disabled').prop('readonly', true);
            $('.parent_withdrawl').addClass('d-none');

        });


        $('.payout_operation').on('click', function() {
            $('.payout_operation').prop('disabled', true);

            $('#old_password').prop('disabled', true);
            $('#new_password').prop('disabled', true);
            $('#confirm_password').prop('disabled', true);
            $('.password').prop('disabled', true);

            $('.request').addClass('d-none');
            $('.dropdown-toggle').prop('disabled', true);
            $('.disabled').prop('readonly', true);
            $('.parent_withdrawl').addClass('d-none');
        });


        $('.request').on('click', function() {

            $('.payout_operation').prop('disabled', true);

            $('#old_password').prop('disabled', true);
            $('#new_password').prop('disabled', true);
            $('#confirm_password').prop('disabled', true);
            $('.password').prop('disabled', true);

            $('.request').addClass('d-none');
            $('.request_load').removeClass('d-none');
            $('.dropdown-toggle').prop('disabled', true);
            $('.disable').prop('readonly', true);
            $('.parent_withdrawl').addClass('d-none');
        });
    });
</script>


@endsection