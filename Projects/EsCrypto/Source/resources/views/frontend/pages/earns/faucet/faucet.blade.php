@extends('frontend.main.index')
@section('faucet')

<!--  -->

<div class="modal fade" id="claims" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

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

<script type="text/javascript">
    atOptions = {
        'key' : 'bb865c0ba3b3888787c9b4f7ebafb290',
        'format' : 'iframe',
        'height' : 50,
        'width' : 320,
        'params' : {}
    };
    document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/bb865c0ba3b3888787c9b4f7ebafb290/invoke.js"></scr' + 'ipt>');
</script>


    <div class="modal-dialog modal-dialog-centered" data-bs-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <h5 id="modalLabel">Congratulations</h5>

                <div style="background-color: blue; height: 250px; width: 300px; margin: 0 auto;">
                    <!-- <div style="background-color: blue; height: 250px; width: 300px; margin: 0 auto;"> -->

<iframe data-aa='2306707' src='//ad.a-ads.com/2306707?size=300x250' style='width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

                </div>

                <div class="position-relative mt-3">
                    <hr class="bg-300" />
<div class="divider-content-center">$ {{ Session::get('FaucetUsdAmount') }}</div>
                </div>




<form method="POST" action="{{ route('faucet.send') }}" role="form">

    @csrf
    <div class="text-center mb-3 cf-turnstile"
            data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
    ></div>
    <button class="btn btn-primary w-100 claimer d-none" type="submit" name="submit">Claim</button>
</form>


<button class="btn btn-primary w-100 claimer_load" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Claim Request...
</button>

            </div>
        </div>
    </div>

    <iframe data-aa='2306708' src='//ad.a-ads.com/2306708?size=970x90' style='width:970px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>
    
</div>




<!--  -->


        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>

            <!--/.bg-holder-->


 

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">

<h3>Available {{ Session('PageUnit') }} : {{ Session('Balance')[Session('PageUnit')] }}</h3>

                </div>

            <div class="card-body">
              <div class="alert alert-warning p-4 mb-0" role="alert">
                <div class="d-flex"><span class="fab fa-intentionally-kept fs-3"></span>
                  <div class="flex-1 ms-3">
                    <h4 class="alert-heading">Before you start!</h4>


            <ul class="bullet-inside ps-0">
                <p class="fs--1 mb-0">
    <li style="font-size: 0.8rem;">Please disable your adblock extension to continue receiving rewards</li>
    <li style="font-size: 0.8rem;">Complete This Claim to Get: {{ session('FaucetCryptoAmount') }} {{ session('PageUnit') }}</li>
    <li style="font-size: 0.8rem;">Today Claims: {{ session('FaucetClaimed') }}/{{ session('FaucetLimit') }} ({{ session('FaucetRemaining') }} left)</li>
    <li style="font-size: 0.8rem;">1 {{ session('PageUnit') }} = ${{ session('CryptoPrice') }}</li>
    <li style="font-size: 0.8rem;">$1 = {{ number_format(1 / session('CryptoPrice'), 6) }} {{ session('PageUnit') }}</li>
                </p>
            </ul>



                  </div>
                </div>
              </div>
            </div>


              </div>
            </div>
        </div>


        

          <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<script async="async" data-cfasync="false" src="//pl22649609.profitablegatecpm.com/e15587654627a512e9e296f974d70f3f/invoke.js"></script>
<div id="container-e15587654627a512e9e296f974d70f3f"></div>


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

<iframe data-aa='2306704' src='//ad.a-ads.com/2306704?size=728x90' style='width:728px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

            </div>
          </div>


          <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">


<!--  -->
<div class="card mb-3">
<div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
</div>
<h5 class="mb-0 text-center">ADS #4</h5>
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
<!--  -->
<div class="card mb-3">
<div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
</div>
<h5 class="mb-0 text-center">ADS #5</h5>
<div class="card-body text-center">

<iframe data-aa='2306706' src='//ad.a-ads.com/2306706?size=468x60' style='width:468px; height:60px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

<!-- <a class="link ads" href="//cdn.bmcdn6.com/go?ci=a474abfb-9a6a-48c3-939f-5f53eaeafa30&amp;ai=65d34c697dd48db1145de948&amp;sr=264121594130&amp;fid=8d363983d6b235261325a1c67b265b7f" target="_blank"><iframe frameborder="0" scrolling="no" seamless="seamless" class="link-image" src="//media.bmcdn6.com/html5/23dc3370-cf24-11ee-a7ba-b595b9c9b901698408a9-7c54-4c9e-88d0-639601a4b67363934351e4aad7514630936a/index.html" style="width:468px;height:60px;pointer-events:none;overflow:hidden"></iframe></a> -->

</div>
</div>
<!--  -->
<div class="card mb-3">
<div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
</div>
<h5 class="mb-0 text-center">ADS #6</h5>
<div class="card-body text-center">

<iframe data-aa='2306711' src='//ad.a-ads.com/2306711?size=120x60' style='width:120px; height:60px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

</div>
</div>


<!--  -->
</div>



<!--  -->


   <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">

<!--  -->
                <div class="card mb-3 overflow-hidden">
            
                  <div class="card-header">
                    <h5 class="mb-0">ADS #1</h5>
                  </div>

            <div class="card-body text-center">

<script type="text/javascript">
  atOptions = {
    'key' : '8273667a1335ea9c91d95f311c7b1b65',
    'format' : 'iframe',
    'height' : 300,
    'width' : 160,
    'params' : {}
  };
  document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/8273667a1335ea9c91d95f311c7b1b65/invoke.js"></scr' + 'ipt>');
</script>


<!-- <a class="link ads"><iframe src="https://cdn.ctengine.io/blank/4/2/4/index.html" allowtransparency="true" width="160" height="600" class="ct_cK3ARXjZEuY_outer" sandbox="allow-forms allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" style="border: 0; overflow: hidden; margin:0 auto; width: 160px; min-width: 160px; max-width: 160px; height: 600px; min-height: 600px; max-height: 600px;"></iframe></a> -->

            </div>

                </div>

<!--  -->
                <div class="card mb-3">

                  <div class="card-header">
                    <h5 class="mb-0">ADS #2</h5>
                  </div>

            <div class="card-body text-center">

<iframe data-aa='2306709' src='//ad.a-ads.com/2306709?size=120x600' style='width:120px; height:600px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

<!-- <a class="link ads"><iframe src="https://cdn.ctengine.io/blank/4/2/4/index.html" allowtransparency="true" width="160" height="600" class="ct_cK3ARXjZEuY_outer" sandbox="allow-forms allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" style="border: 0; overflow: hidden; margin:0 auto; width: 160px; min-width: 160px; max-width: 160px; height: 600px; min-height: 600px; max-height: 600px;"></iframe></a> -->
    
</div>
</div>
<!--  -->
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="mb-0">ADS #3</h5>
                  </div>
<!-- <div class="ads" style="background-color: blue; height: 610px;width: 305px;"></div> -->


            <div class="card-body text-center">
<iframe data-aa='2306710' src='//ad.a-ads.com/2306710?size=160x600' style='width:160px; height:600px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

<!-- <a class="link ads"><iframe src="https://cdn.ctengine.io/blank/4/2/4/index.html" allowtransparency="true" width="160" height="600" class="ct_cK3ARXjZEuY_outer" sandbox="allow-forms allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" style="border: 0; overflow: hidden; margin:0 auto; width: 160px; min-width: 160px; max-width: 160px; height: 600px; min-height: 600px; max-height: 600px;"></iframe></a> -->
    
</div>


                </div>




<!--  -->
@if (session('FaucetRemaining') >= 1)
                <div style="margin-bottom: 180px;" id="solve-card" class="card">

                  <div style="padding: 0.5rem 1.2rem;" class="card-header">
                <h5 style="text-align:center;" class="mb-0">Claim Zone ({{ session('PageUnit') }})</h5>

           </div>
            <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>


<div class="toast notice" role="alert" data-options='{"autoShow":true,"autoShowDelay":0,"showOnce":true,"cookieExpireTime":7200000}' data-autohide="false" aria-live="assertive" aria-atomic="true">
  <div class="toast-body">

    <!-- Your notice content  -->
  </div>
</div>
<div style="text-align:center;" id="container0">
    <h1 class="fs++2" id="time">0:00</h1>
</div>




<div id="solve" hidden style="text-align:center;">

<div id="que">

<p class="fs++2" style="font-weight: bold;">
    <?php 

        $questions = explode(PHP_EOL, session('Question'));

        foreach ($questions as $q) {
            $parts = explode(' ', $q);

            $firstNumber = $parts[1] ?? 'N/A';
            $operation1 = $parts[2] ?? 'N/A';
            $secondNumber = $parts[3] ?? 'N/A';
            $operationResult = $parts[4] ?? 'N/A';
            $sumResult = $parts[5] ?? 'N/A';

            // Set colors based on conditions
            $firstColor = 'green';
            $operation1Color = 'yellow';
            $secondColor = 'red';
            $operationResultColor = 'white';
            $sumResultColor = '#006400';

            echo '<span style="color: ' . $firstColor . ';">' . $firstNumber . '</span> ';

            echo '<span style="color: ' . $operation1Color . ';">' . $operation1 . '</span> ';
            echo '<span style="color: ' . $secondColor . ';">' . $secondNumber . '</span> ';
            echo '<span style="color: ' . $operationResultColor . ';">' . $operationResult . '</span> ';
            echo '<span style="color: ' . $sumResultColor . ';">' . $sumResult . '</span><br>';
        }
    ?>
</p>







<button id="yesButton" class="btn btn-outline-success" type="button">Y</button>
<button id="noButton" class="btn btn-outline-danger" type="button">N</button>

<div style="margin-top: 4px;margin-bottom: 4px;" class="border-dashed-bottom my-2"></div>
</div>



        

<button hidden id="claimButton" class="btn btn-success me-0 mb-0" type="button" disabled="disabled"
data-bs-toggle="modal" data-bs-target="#claims">Claim</button>



</div>
<p style="text-align:center;margin-top: 4px;margin-bottom: 4px;" class="fs--2">Every ({{ session('Timer') }}) Sec</p>
                  </div>
@endif
<!--  -->



                </div>
              </div>
            </div>




        



<!-- Add these links in the <head> section of your HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Include jQuery before this script if not already included -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    var secondsRemaining;
    var intervalHandle;
    var time;
    var solveElement;
    var answer = {!! json_encode(session('Answer')) !!};
    var cryptoTimer = {!! json_encode(session('Timer')) !!};
    var timeLeft = {!! json_encode(session('TimeLeft')) !!};

    function updateTimerDisplay() {
        var timeDisplay = document.getElementById("time");

        var min = Math.floor(secondsRemaining / 60);
        var sec = secondsRemaining - (min * 60);

        if (sec < 10) {
            sec = "0" + sec;
        }

        var message = min.toString() + ":" + sec;

        timeDisplay.innerHTML = message;
    }

    function tick() {
        updateTimerDisplay();

        if (secondsRemaining === 0) {
            solveElement = document.getElementById("solve");
            solveElement.removeAttribute("hidden"); // Show the element

            time = document.getElementById("time");
            time.setAttribute("hidden", true);

            clearInterval(intervalHandle);
        }

        secondsRemaining--;
    }

    function startCountdown(timeLeft) {
        secondsRemaining = timeLeft;
        updateTimerDisplay(); // Update the timer display initially
        intervalHandle = setInterval(tick, 1000);
    }


    function checkAnswer(selectedAnswer) {
        var solve = document.getElementById("solve-card");

        if (selectedAnswer === answer) {
            // Correct answer
            var claimButton = document.getElementById("claimButton");
            claimButton.removeAttribute("disabled");
            claimButton.removeAttribute("hidden");

            var que = document.getElementById("que");
            que.setAttribute("hidden", true);

        } else {

        solve.setAttribute("hidden", true);



        // Display an uncancellable SweetAlert for the wrong answer with a black button
        Swal.fire({
            title: 'Wrong!',
            text: 'The true Answer is :' + answer,
            icon: 'error',
            showConfirmButton: false, // Remove the "OK" button
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                confirmButton: 'black-button'
            }
        }).then(() => {
            // Reload the page after a certain delay (if needed)
            setTimeout(() => {
                location.reload();
            }, 5000); // Example: Reload the page after 5 seconds
        });

            location.reload(); // Refresh the page



        }
    }

    document.addEventListener('DOMContentLoaded', function () {

        startCountdown(timeLeft);

        $('#claims').modal({
            backdrop: 'static',
            keyboard: false
        });

        var ysButton = document.getElementById("yesButton");
        var noButton = document.getElementById("noButton");

        // Add click event handlers for Yes and No buttons
        ysButton.addEventListener("click", function () {
            ysButton.setAttribute("hidden", true);
            noButton.setAttribute("hidden", true);

            checkAnswer("Yes");
        });

        noButton.addEventListener("click", function () {
            ysButton.setAttribute("hidden", true);
            noButton.setAttribute("hidden", true);

            checkAnswer("No");
        });



        var timer = 15000;

        $('#claims').on('shown.bs.modal', function() {
            // Wait for 10 seconds (10000 milliseconds) before enabling the button
            setTimeout(function() {
                $('.claimer_load').addClass('d-none');
                $('.claimer').removeClass('d-none');
            }, timer);
        });

        $('.claimer').on('click', function() {

            $('.claimer').addClass('d-none');
            $('.claimer_load').removeClass('d-none');


        });


    });



</script>
@endsection
