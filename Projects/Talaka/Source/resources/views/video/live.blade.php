@extends('frontend.main.index')
@section('room')

<style type="text/css">
        video {
      max-width: calc(95% - 100px);
      margin: 10px 20px;
      box-sizing: border-box;
      border-radius: 2px;

      padding: 10px 0px;
      box-shadow: rgba(156, 172, 172, 0.2) 0px 2px 2px, rgba(156, 172, 172, 0.2) 0px 4px 4px, rgba(156, 172, 172, 0.2) 0px 8px 8px, rgba(156, 172, 172, 0.2) 0px 16px 16px, rgba(156, 172, 172, 0.2) 0px 32px 32px, rgba(156, 172, 172, 0.2) 0px 64px 64px;
    }
</style>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <span id="Question" class="d-none"></span>
        <select id="Accent" class="d-none"></select>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-100">
        <div class="container">
          <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">Page</a>, &nbsp;<a class="d-inline-block text-500">Video Call Room</a></div>
          </div>
          <div class="row">
           


            <div class="col-lg-12">


              <div class="card">
               

                <div class="card-body">
                    <h4>Informations</h4>
                    <p>Rules & Instructions.</p>

<ul>
    <li>Rules: While Video Call, Respect Each Others.</li>
    <li>Rules: Let's respect each other and avoid getting banned.</li>
    <li>Rules: If the guest hasn't joined yet, please hit the "send reminder now" button.</li>
    <li>Instructions: Please rate the system after every call by assigning a score. Strive to do your best.</li>
</ul>

<p>Video Chat Guests:</p>

<ul>
    <li>Me: {{$me->firstname}} {{$me->lastname}}</li>
    <li>Guest: {{$user->firstname}} {{$user->lastname}}</li>
</ul>



            </div>
          </div>
        </div><!-- end of .container-->
@if($id)
<div class="col-12 mt-4 text-center">



                <div class="mb-5">
                  <h5 id="stream_members" class="mb-4">Stream (0/2)</h5>
                  <div class="bg-white pb-5 rounded-3">
                    <div class="swiper news-slider pb-2" data-swiper='{"loop":true,"slidesPerView":1,"pagination":{"el":".swiper-pagination","type":"bullets","clickable":true}}'>

 <video height="300" autoplay muted width="300" id="localVideo" class="" alt="Me"></video>

 <div>
    <button class="btn-info btn" id="toggleAudioButton">mute Audio</button>
    <button class="btn-info btn" id="toggleVideoButton">mute Video</button>
 </div>

<video id="remoteVideo" autoplay class="card-img-top" alt="Other"></video>
                  

</div>

<div style="display: flex;justify-content: space-evenly;">
    @include('video.accent')
    @include('video.verbs')
    @include('video.polite')
</div>

 </div>





<div class="d-flex justify-content-center">

<form class="mt-4 receive" method="POST" action="{{ route('reminder', ['ID' => $id, 'Email' => $user->email]) }}" role="form">
    @csrf
    <button class="btn-warning btn d-none" type="submit" name="submit" id="reminder">
        <span class="fw-semi-bold">Send Reminder Now</span>
    </button>
</form>



</div>
</div>
@endif

      </section><!-- <section> close ============================-->
      <!-- ============================================-->



    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

@include('video.room')

<script type="text/javascript">
    let rates = [];
    let checker;

    checker = setInterval(Checking, 1000);

    var rateBtn = document.getElementsByName("rating");
    var verbstn = document.getElementsByName("verbs");
    var politeBtn = document.getElementsByName("polite");

    var forms = document.getElementsByClassName("rating-slider");

    let rec_id, from, to, accent, verbs, polite;

    rec_id = {{$id->id}};
    from = {{$me->id}};
    to = {{$user->id}};

    function Checking() {



        rates.length = 0;


        for (var i = 0; i < rateBtn.length; i++) {
            if (rateBtn[i].checked && rateBtn[i].value != 0) {
                rates.push('Accent:'+ rateBtn[i].value);
                accent = rateBtn[i].value;
                break; // Exit the loop since we found the checked radio button
            }
        }


        for (var i = 0; i < verbstn.length; i++) {
            if (verbstn[i].checked && verbstn[i].value != 0) {
                rates.push('Verbs:'+ verbstn[i].value);
                verbs = verbstn[i].value;
                break; // Exit the loop since we found the checked radio button
            }
        }


        for (var i = 0; i < politeBtn.length; i++) {
            if (politeBtn[i].checked && politeBtn[i].value != 0) {
                rates.push('Politely:'+ politeBtn[i].value);
                polite = politeBtn[i].value;
                break; // Exit the loop since we found the checked radio button
            }
        }


        if (rates.length == 3) {

            clearInterval(checker);

            for (var i = 0; i < forms.length; i++) {
                forms[i].classList.add('d-none');
            }


    //  let rec_id, from, to, accent, verbs, polite;.
    // public function Result($ID, $From, $To, $Accent, $Verbs, $Polite){
    // let rec_id, from, to, accent, verbs, polite;

      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: '/rates',
        type: 'POST',
        data: { 
          ID: rec_id,
          From: from,
          To: to,
          Accent: accent,
          Verbs: verbs,
          Polite: polite,
          '_token': csrfToken
        },
        success: function(response) {
          // window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}/' + LinkIndex;
        },
        error: function(error) {
          // window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}';
        }
      });





        }



    }
</script>
@endsection