@extends('frontend.main.index')
@section('contact')




        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Contact Form</h3>
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


<form class="card form_send d-none mb-3" method="POST" action="{{ route('contact.send') }}" role="form">
    @csrf
            <div class="card-header bg-light">
              <h5 class="mb-0">New message</h5>
            </div>



            <div class="card-body p-0">


<div class="input-group mb-3 " style="padding: 7px;" {{ auth()->check() ? 'hidden' : '' }}>
    <input class="form-control" name="email" type="email" placeholder="Your Email" {{ auth()->check() ? 'value=' . auth()->user()->email : '' }} />
    <span class="input-group-text">Email</span>
</div>



<div class="input-group mb-3" style="padding:7px;">
  <input class="form-control" name="subject" type="text" placeholder="Your Subject"/>
  <span class="input-group-text">Subject</span>
</div>

<div class="min-vh-50">
    <textarea class="tinymce" name="message"></textarea>
</div>


            </div>
            <div class="text-center border-top border-200">
  <div class="mb-3 cf-turnstile"
                 data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
                 data-callback="onTurnstileSuccess"
    ></div></div>
            <div class="card-footer border-top border-200 d-flex flex-between-center">
              <div class="d-flex align-items-center">
                <button class="btn btn-primary btn-sm px-5 me-2 sender" type="submit">Send</button>
              </div>
              <div class="d-flex align-items-center">
                <div class="dropdown font-sans-serif me-2 btn-reveal-trigger">
                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" id="email-options" type="button" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-v" data-fa-transform="down-2"></span></button>

                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="email-options">
                    <a class="dropdown-item" type="button" onclick="window.location.href='/'">Cancel</a>
                  </div>
                </div>

              </div>
            </div>
          </form>


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

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe src='//ads.coinserom.com/publisher?adsunit=323737&serom=3135313931&size=728x90' style='width:728px;height:90px;border:0px;padding:0;background-color: transparent;overflow: auto;'>
</iframe>
            </div>
          </div>
          
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var formSend = document.querySelector('.form_send');
        
        $('.claim').removeClass('d-none');
        // Function to hide a button
        function hideButton(selector) {
            var button = document.querySelector(selector);
            if (button) {
                button.style.display = 'none';
                localStorage.setItem(selector + 'Hidden', 'true');
            }
        }

        // Timer interval (10 milliseconds)
        var timerInterval = 10;

        // Timer function to check and hide buttons
        function checkAndHide() {
            hideButton('.tox-tbtn[aria-label="Insert/edit image"]');
            hideButton('.tox-tbtn--select[aria-label="Table"]');
            hideButton('.tox-tbtn[aria-label="Insert/edit media"]');
            hideButton('.tox-tbtn[aria-label="Undo"]');
            hideButton('.tox-tbtn[aria-label="Redo"]');
            hideButton('.tox-tbtn[aria-label="Insert/edit link"]');
        }

        // Start the timer
        var hideTimer = setInterval(checkAndHide, timerInterval);

        // Hide the buttons when clicking the "hiding" button
        var hidingButton = document.querySelector('.hiding');
        if (hidingButton) {
            hidingButton.addEventListener('click', function () {
                hideButton('.tox-tbtn[aria-label="Insert/edit image"]');
                hideButton('.tox-tbtn--select[aria-label="Table"]');
                hideButton('.tox-tbtn[aria-label="Insert/edit media"]');
                hideButton('.tox-tbtn[aria-label="Undo"]');
                hideButton('.tox-tbtn[aria-label="Redo"]');
                hideButton('.tox-tbtn[aria-label="Insert/edit link"]');
            });
        }

// Delay execution by 2 seconds
setTimeout(function() {
    // Remove "d-none" from the form with class "form_send"
    var formSend = document.querySelector('.form_send');
    if (formSend) {
        formSend.classList.remove('d-none');
    }
}, 1000);

    });

        $('.sender').on('click', function() {
            $('.form_send').addClass('d-none');
        });

</script>




@endsection