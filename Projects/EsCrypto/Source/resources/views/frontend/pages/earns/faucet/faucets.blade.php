@extends('frontend.main.index')
@section('faucets')


          <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Faucets List</h5>
                </div>
              </div>
            </div>

    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-69509e48-2655-43d3-8909-52d133e261bb" id="dom-69509e48-2655-43d3-8909-52d133e261bb">
                <label for="organizerSingle">Select</label>
                <select class="form-select js-choice" id="organizerSingle" size="1" name="organizerSingle" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option>BTC</option>
                    <option>LTC</option>
                    <option>DOGE</option>
                    <option>TRX</option>
                    <option>BNB</option>
                    <option>BCH</option>
                    <option>DASH</option>
                    <option>DGB</option>
                    <option>ETH</option>
                    <option>FEY</option>
                    <option>SOL</option>
                    <option>USDT</option>
                    <option>ZEC</option>
                </select>
            </div>
        </div>
        <div style="padding-top: 10px;" class="d-grid gap-2">
            <!-- Added a placeholder href for initial page load -->


            <div class="col-lg-12">

    <button class="btn btn-primary w-100 claim_load d-none" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
</button>

    <a id="selectButton" class="btn btn-primary d-block w-100 claim" type="button" href="#">Select</a>

    <!-- <button class="btn btn-primary d-block w-100 claim" type="submit">Update</button> -->
</div>



        </div>
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

@endsection


 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <script>
        $(document).ready(function () {
            $('.claim').removeClass('d-none');
            // Function to update button text based on the selected option
            function updateButtonText() {
                var selectedOption = $('#organizerSingle').val();
                var buttonText = "Claim " + selectedOption;
                var buttonHref = "/faucet/" + selectedOption.toLowerCase(); // Assuming the options are in lowercase in the href

                $('#selectButton').text(buttonText);
                $('#selectButton').attr('href', buttonHref);
            }

            // Event listener for select change
            $('#organizerSingle').change(function () {
                updateButtonText();
            });

        $('.claim').on('click', function() {

            $('.claim').addClass('d-none');
            $('#organizerSingle').prop('disabled', true);
            // $('.claim_load').removeClass('d-none');
        });

            // Initial update on page load
            updateButtonText();
        });
    </script>