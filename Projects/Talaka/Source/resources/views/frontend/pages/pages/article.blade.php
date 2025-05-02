@extends('frontend.main.index')
@section('article')


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
              <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Article</h1>
              <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                <ol class="breadcrumb fs-1 ps-0 fw-bold">
                  <li class="breadcrumb-item active"><a class="text-white"type="button" onclick="window.location.href='/'">Home</a></li>
                  <li class="breadcrumb-item active"><a class="text-white" type="button" onclick="window.location.href='/articles'">Articles</a></li>
                  <li class="breadcrumb-item" aria-current="page">#{{ $ID }}</li>
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
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">{{ \Carbon\Carbon::parse($article->created_at)->format("F j, Y") }}</a></div>
            <h4 data-zanim-xs='{"delay":0.1}'>{{$article->title}}</h4>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card mb-6">


<iframe style="padding: 8px; border-radius: 25px;" height="450" src="https://www.youtube.com/embed/{{$article->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="card-body p-5">
                  <p class="fs--1 text-500">Short Description</p>
                  <p>{{$article->short}}.</p>
                  <ol>
                    <p>About: {{$article->short}}.</p>
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

             
                <div class="mb-5">
                  <h5 class="mb-4">Photo</h5>
                  <div class="bg-white pb-5 rounded-3">
                    <div class="swiper news-slider pb-4" data-swiper='{"loop":true,"slidesPerView":1,"pagination":{"el":".swiper-pagination","type":"bullets","clickable":true}}'>


                  <div class="swiper-wrapper">
                    @foreach($imgs as $key => $image)
                        <div class="swiper-slide {{$key}}">
                            <div class="card"><a><img style="padding: 8px; border-radius: 25px;" width="270" height="190" class="card-img-top" src="{{ asset('frontend/upload/articles/article/' . $image) }}" alt="Talaka Article" /></a>
                            </div>
                        </div>
                    @endforeach
                  </div>

                      <div class="swiper-pagination"></div>
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