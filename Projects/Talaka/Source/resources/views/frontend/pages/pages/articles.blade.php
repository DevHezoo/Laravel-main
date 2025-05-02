@extends('frontend.main.index')
@section('articles')

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
              <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Articles</h1>
              <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                <ol class="breadcrumb fs-1 ps-0 fw-bold">
                  <li class="breadcrumb-item"><a class="text-white" type="button" onclick="window.location.href='/'">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Articles</li>
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
          <div class="row g-4">

            @foreach($CurrentlyPageArticles as $key => $article)
            
            @if($CurrentlyPageArticles[$key]['level'] <= $lvl)
            <div class="col-md-6 col-lg-4">
              <div class="card"><a><img class="card-img-top" src="{{ asset('frontend/upload/articles/image.png') }}" alt="Talaka #{{ count($articles) - $key }}" draggable="false" /></a>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden"><a>
                      <h5 data-zanim-xs='{"delay":0}'>{{$CurrentlyPageArticles[$key]['title']}}</h5>
                    </a></div>
                  <div class="overflow-hidden">
                  <p class="text-500" data-zanim-xs='{"delay":0.4}'>By {{ \App\Models\User::find($CurrentlyPageArticles[$key]['author'])->firstname }} {{ \App\Models\User::find($CurrentlyPageArticles[$key]['author'])->lastname }}</p>
                  </div>
                  <div class="overflow-hidden">
                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'>{{$CurrentlyPageArticles[$key]['short']}}.</p>
                  </div>
                  <div class="overflow-hidden">
                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" type="button" onclick="window.location.href='/article/{{ count($articles) - $key }}'">View Article {{ $CurrentlyPageArticles[$key]['id'] }}<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @endforeach



          </div>

          <div class="row">
            <div class="col-auto mx-auto mt-4">
              <nav class="mt-5" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

            @for ($Page = 1; $Page <= $TotalPages; $Page++)


<li class="page-item @if($Page == $CurrentlyPage) active @endif"><a type="button" onclick="window.location.href='/articles/{{$Page}}'" class="page-link lh-sm">{{$Page}}</a></li>

            @endfor

                </ul>
              </nav>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



@endsection