@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>

@include('frontend.body.header')
<title>{{ $seo-> meta_title }}</title>

@include('frontend.body.icon')
@include('frontend.body.init')

<style>
  #container0,
  #solve {
    position: relative;
    z-index: 1;
  }

  .bg-holder0 {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
  }
</style>
</head>

  <body>
    <script>
      confetti.start();
    </script>

    <main class="main" style="user-select: none;">
      <div class="container" data-layout="container">

            @include('frontend.body.menu')

        <div class="content">

            @include('frontend.body.nav')

            <!-- Content -->
            @yield('dashboard')

            <!-- Content -->
            @yield('faucets')
            
            <!-- Content -->
            @yield('faucet')

            <!-- Content -->
            @yield('settings')

            <!-- Content -->
            @yield('bonus')
            
            <!-- Content -->
            @yield('log')

            <!-- Content -->
            @yield('privacy')

            <!-- Content -->
            @yield('cookie')

            <!-- Content -->
            @yield('contact')


            <!-- Content -->
            @yield('shortlink')
            
            <!-- Content -->
            @yield('start')

            <!-- Content -->
            @yield('check')

            <!-- Content -->
            @yield('starting')

            <!-- Content -->
            @yield('tutorial')

            <!-- Content -->
            <!-- @yield('alert') -->

            <!-- Content -->
            @yield('verify')


            @include('frontend.body.footer')

            @include('frontend.body.model')
 

              </div>
            </div>
   

@if (!isset($_COOKIE['cookie_consent']) || $_COOKIE['cookie_consent'] !== 'accepted')

<script>
 var myModal = new bootstrap.Modal(document.getElementById('about'));
  myModal.show();
</script>

    <script>
        function acceptCookies() {
            document.cookie = "cookie_consent=accepted; expires=" + new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";
            document.getElementById('cookie-notice').style.display = 'none';
        }
    </script>
@endif


      </div>
    </main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">

function changeLanguage(locale) {
  // Perform a fetch request to your Laravel route
  fetch(`/change-language/${locale}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ locale: locale })
  })
    .then(response => {
      // Reload the page after language change
      location.reload();
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

function send(status){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/session',
            type: 'POST',
            data: { data: status, '_token': csrfToken},
        });
}

window.onload = function () {
    setTimeout(function () {
        var adsblock = new bootstrap.Modal(document.getElementById('adsblock'));
        var vpn = new bootstrap.Modal(document.getElementById('vpn'));
        var multiacount = new bootstrap.Modal(document.getElementById('multiacc'));

        var hided = false;

        // Check if an element with the 'ads' class is hidden (indicating an ad blocker)
        var adsElements = document.getElementsByClassName('ads');
        for (var i = 0; i < adsElements.length; i++) {
            if (adsElements[i].offsetHeight === 0) {
                hided = true;
            }
        }

        if (hided === true) {
            adsblock.show();
            send('No');
        } else if ("{{ session('Data')['proxy'] }}" === 'yes') {
            vpn.show();
            send('No');
        } else {
            var multiAccountData = @json(session('MultiAccount'));
            if (multiAccountData && multiAccountData.length > 2) {
                multiacount.show();
                send('No');
            }
            // Redirect to another page if none of the conditions are met
            // window.location.href = '/';
        }
    }, 1000); // 1000 milliseconds = 1 second
};


</script>

<script async src="https://appsha-prm.ctengine.io/js/script.js?wkey=Cau226rJKi"></script>
<!-- <script type='text/javascript' src='//pl22649653.profitablegatecpm.com/a9/27/65/a92765d4952517a0d310813956d85d37.js'></script> -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD46243B6N"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VD46243B6N');
</script>

</body>
</html>