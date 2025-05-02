@extends('frontend.main.index')
@section('contact')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEsCiINb0RgS4spVmSaUPvg_o74nP6ghk&callback=initMap"></script>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


    <!-- <section> begin ============================-->
    <section>
      <div class="bg-holder overlay" style="background-image: url({{ asset('frontend/assets/img/background-2.jpg') }});background-position:center bottom;"></div>
      <!--/.bg-holder-->
      <div class="container">
        <div class="row pt-6" data-inertia='{"weight":1.5}'>
          <div class="col-md-8 text-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div class="overflow-hidden">
              <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Contact</h1>
              <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                <ol class="breadcrumb fs-1 ps-0 fw-bold">
                  <li class="breadcrumb-item"><a class="text-white" type="button" onclick="window.location.href='/'">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-100">
        <div class="container">

          <div class="row align-items-stretch justify-content-center mb-4">
            
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="card h-100">
                <div class="card-body px-5">
                  <h5 class="mb-3">Main Office</h5>
                  <p class="mb-0 text-1100"> Mall Alhamd Street,<br />247 Buildings,<br />Giza</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="card h-100">
                <div class="card-body px-5">
                  <h5 class="mb-3">Alternative Office</h5>
                  <p class="mb-0 text-1100"> Soon</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="card h-100">
                <div class="card-body px-5">
                  <h5>Socials</h5>
                  <a class="d-inline-block mt-2" type="button" onclick="window.open('https://www.youtube.com/@talaka971', '_blank')">
                    <span class="fab fa-youtube fs-2 me-2 text-primary"></span></a>
                  <a class="d-inline-block mt-2" type="button" onclick="window.open('https://www.facebook.com/profile.php?id=100064750986906', '_blank')">
                      <span class="fab fa-facebook fs-2 mx-2 text-primary"></span></a>
                </div>
              </div>
            </div>
          </div>

<div class="card mb-4">
    <div class="card-body p-5 h-100">
        <a href="https://www.google.com/maps/place/%D9%85%D8%B1%D9%83%D8%B2+%D8%B7%D9%84%D8%A7%D9%82%D8%A9+%D8%AA%D8%B9%D9%84%D9%8A%D9%85+%D8%A7%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A+%D9%84%D9%84%D8%A7%D8%B7%D9%81%D8%A7%D9%84Talaka%E2%80%AD/@29.9462076,31.0671656,12z/data=!4m6!3m5!1s0x14585342cf98aa71:0x61e2e8a792e14796!8m2!3d29.9207404!4d31.0283764!16s%2Fg%2F11l5hrd016?authuser=5&entry=ttu" target="_blank">
            <div class="googlemap" data-gmap="data-gmap" data-latlng="48.8583701,2.2922873,17" data-scrollwheel="false" data-icon="assets/img/map-marker.png" data-zoom="17" data-theme="Tripitty">
                <div class="marker-content py-3">
                    <h5>Eiffel Tower</h5>
                    <p class="mb-0">Gustave Eiffel's iconic, wrought-iron 1889 tower,<br /> with steps and elevators to observation decks.</p>
                </div>
            </div>
        </a>
    </div>
</div>


          <div class="card">
            <div class="card-body h-100 p-5">
              <h5 class="mb-3">Write to us</h5>
              <form method="POST" action="{{ route('contact') }}" role="form">
    @csrf


<div class="mb-4">
    <input class="form-control bg-white" 
           value="@auth{{ session('User')->firstname . ' ' . session('User')->lastname }}@endauth" 
           type="text" 
           placeholder="Your Name" 
           name="fullname" 
           @auth readonly hidden @endauth
           required="required"
    />
</div>

<div class="mb-4">
    <input class="form-control bg-white" 
           value="@auth{{ session('User')->email}}@endauth" 
           type="email" 
           placeholder="Your Email" 
           name="email" 
           @auth readonly hidden @endauth 
           required="required"
    />
</div>

<div class="mb-4">
    <input class="form-control bg-white"  
           type="text" 
           placeholder="Your Subject"
           name="subject"
          required="required"
    />
</div>

  <div class="mb-4">
  <textarea class="form-control bg-white" name="message" rows="5" placeholder="Enter your Message here..." required="required"></textarea></div>

  <button class="btn btn-md-lg btn-primary" type="Submit"> <span class="color-white fw-600">Send Now</span></button>
              </form>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->


    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



@endsection