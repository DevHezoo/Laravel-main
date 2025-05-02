@extends('frontend.main.index')
@section('verify')




        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Verify Form</h3>
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


        <div class="card mb-3">
    <div class="card-body">
        <form class="row g-3 needs-validation" novalidate="">
            <div class="col-md-6 position-relative">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-label" for="validationTooltip04">Verification Process</label>
                </div>
                <select class="form-select" id="validationTooltip04" required="">
                    <option selected="" disabled="" value="">Select ...</option>
                    <option selected>Telegram</option>
                </select>
                <div class="valid-tooltip">Correct!</div>
                <div class="invalid-tooltip">Please select a valid state.</div>
            </div>

            <div class="col-md-6 position-relative">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-label" for="validationTooltip05">Your Code</label>
                    <a style="font-size: 0.6rem" class="form-label" type="button" onclick="window.open('https://t.me/Escryptobot', '_blank')">Send this Code</a>
                </div>
                <input class="form-control" id="validationTooltip05" type="text" value="{{session('Verify')}}" readonly />
                <div class="valid-tooltip">Correct!</div>
                <div class="invalid-tooltip">Please provide a valid Code.</div>
            </div>

            <div style="padding-top: 20px;" class="col-12 text-center">
                <!-- Prevent form submission and call the checkFormValidity function -->
                <button class="btn btn-primary checker" type="button" onclick="checkFormValidity()">Check</button>
            </div>
        </form>
    </div>
</div>

<script>
    function checkFormValidity() {
        // Check if the form is valid before navigating
        if (document.querySelector('.needs-validation').checkValidity()) {
            // Navigate to the specified href
            window.location.href = '/send-verify';
        }
    }
</script>


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

<iframe data-aa='2306705' src='//ad.a-ads.com/2306705?size=970x250' style='border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>

            </div>
          </div>


<script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
            $('.checker').removeClass('d-none');
            
            $('.checker').on('click', function() {
            $('.checker').addClass('d-none');
        });
  });

</script>
@endsection