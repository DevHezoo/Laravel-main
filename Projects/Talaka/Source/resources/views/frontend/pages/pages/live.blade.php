@extends('frontend.main.index')
@section('live')


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
              <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Live</h1>
              <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                <ol class="breadcrumb fs-1 ps-0 fw-bold">
                  <li class="breadcrumb-item active"><a class="text-white"type="button" onclick="window.location.href='/'">Home</a></li>
                  <li class="breadcrumb-item active"><a class="text-white" type="button" onclick="window.location.href='/live'">Live</a></li>
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
          <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">Last Live: {{ \Carbon\Carbon::parse($live->updated_at)->format("F j, Y") }}</a></div>
            <h4 data-zanim-xs='{"delay":0.1}'>{{$titleToShow}}</h4>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card mb-6">

@if($titleToShow == 'No Live For Now')
<iframe style="padding: 8px; border-radius: 25px;" height="450" src="https://www.youtube.com/embed/p8YJnwtFtpM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@else
@include('live.listener')
@endif
                <div class="card-body p-5">
                  <p class="fs--1 text-500">Short Description</p>
                  <p>Talaka Live.</p>
                  <ol>
                    <p>About: {{$live->description}}.</p>
                  </ol>
                 
                </div>
              </div>


            </div>
            <div class="col-lg-4 text-center ms-auto mt-5 mt-lg-0">
              <div class="px-2">
                <div class="card mb-5">
                  <div class="card-body p-5">
                    <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll"><img class="rounded-circle" data-zanim-xs='{"delay":0}' src="{{ asset('frontend/upload/users_images/' . $user->image) }}" alt="Author" />
                      <h5 class="text-capitalize mt-3 mb-0" data-zanim-xs='{"delay":0.1}'>{{$user->firstname}}{{$user->lastname}}</h5>
                      <p class="mb-0 mt-3" data-zanim-xs='{"delay":0.2}'>{{$user->short_description}}.</p>

                      <div class="pt-4" data-zanim-xs='{"delay":0.3}'>

                    @if(!empty($user->fb_link))
                        <a class="d-inline-block" type="button" onclick="window.open('{{ $user->fb_link }}', '_blank')">
                            <span class="fab fa-facebook-square fs-2 mx-2 text-400"></span>
                        </a>
                    @endif

                      </div>



                    </div>
                  </div>
                </div>

@if($titleToShow !== 'No Live For Now')
                <div class="mb-5">
                  <h5 class="mb-4">Chat</h5>
                  <div style="padding: 5px;" class="bg-white">
                    <div class="swiper news-slider" data-swiper='{"loop":true,"slidesPerView":1,"pagination":{"el":".swiper-pagination","type":"bullets","clickable":true}}'>


                  <div style="padding-bottom: 15px;" class="swiper-wrapper">
@include('chat.chat')
                  </div>



                        <p id='online'>
                          Loading..!
                        </p>
                     
                    </div>
               
                  </div>
                </div>

                
                <div class="card">
                  <div class="card-body p-5">
                    <h5>Tags</h5>
                    <ul class="nav tags mt-3 fs--1">
                      @foreach($tags as $tag)
                        <li><a class="btn btn-sm btn-outline-primary m-1 p-2">{{$tag}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
@endif
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->


    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



@endsection