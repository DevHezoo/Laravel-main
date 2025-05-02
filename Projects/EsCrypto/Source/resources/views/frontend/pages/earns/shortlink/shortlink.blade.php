@extends('frontend.main.index')
@section('shortlink')

        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>


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
    <li style="font-size: 0.8rem;">Complete All Claims to Get: {{ number_format(session('ShortlinkCryptoAmount') * session('VisitCount'), 8) }} {{ session('PageUnit') }}</li>
    <li style="font-size: 0.8rem;">Today Claims: {{session('TodayVisited')}}/{{session('TotalShortlink')}} ({{session('TotalShortlink') - session('TodayVisited')}} left)</li>
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

          

          <div class="card">
            <div class="card-body p-0 overflow-hidden">
              <div class="row g-0">


@foreach(session('Shortlinks') as $index => $shortlink)

    @php
        $LinkIndex = $shortlink->id;

        // Extract all values inside the parentheses using preg_match_all
        preg_match_all('/\((\d+(?:,\d+)*)\)/', session('User')->links, $matches);
        $allValues = explode(',', $matches[1][0]);


            $visited_this = \App\Models\ShortlinkTask::where('email', session('User')->email)
                ->where('identifier', $allValues[$index])
                ->where('status', 'TRUE')
                ->whereDate('created_at', today()) // Use whereDate to filter by today
                ->count();

        $finished_checker = ($visited_this == $shortlink->visits || $visited_this > $shortlink->visits) ? 'yes' : 'no';


        $prepare = \App\Models\ShortlinkTask::where('email', session('User')->email)
                ->where('identifier', $allValues[$index])
                ->whereDate('created_at', '=', today())
                ->where('status', 'FALSE')
                ->get();

        $link =  \App\Models\Links::where('id', $allValues[$index])->first();

        $finished = \App\Models\ShortlinkTask::where('email', session('User')->email)
                ->where('identifier', $allValues[$index])
                ->whereDate('created_at', '=', today())
                ->where('status', 'TRUE')
                ->where('hasher', $link->hasher)
                ->first();


    @endphp




    <div class="col-12 p-card {{ $index % 2 == 0 ? '' : 'bg-100' }}">
        <div class="row">
            <div class="col-sm-5 col-md-4">
                <div class="position-relative h-sm-100">
                    <div class="swiper-container theme-slider h-100" data-swiper='{"autoplay":true,"autoHeight":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"navigation":{"nextEl":".swiper-button-next","prevEl":".swiper-button-prev"}}'>
                        <div class="swiper-wrapper h-100">
                            @php
                                $imgs = explode('|', $shortlink->image);
                            @endphp
                            @foreach($imgs as $img)
                                <div class="swiper-slide h-100">
                                    <a class="d-block h-sm-100">
                                        <img class="rounded-1 h-100 w-100 fit-cover" src="{{ asset('frontend/assets/img/shortlinks/' . $img) }}" alt="" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                    </div>

@if($finished_checker === 'no')

@if (count($prepare) > 0)
<div class="badge rounded-pill bg-warning position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">{{ session('ShortlinkCryptoAmount') }} {{ session('PageUnit') }}</div>
@else
<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">{{ session('ShortlinkCryptoAmount') }} {{ session('PageUnit') }}</div>
@endif

@endif

                </div>
            </div>
            <div class="col-sm-7 col-md-8">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="mt-3 mt-sm-0">
                            <a class="text-dark fs-0 fs-lg-1">{{ $shortlink->title }}</a>
                        </h5>
                        <p class="fs--1 mb-2 mb-md-3">
                            <a class="text-500">{{ $shortlink->Description }}</a>
                        </p>
                        <ul class="list-unstyled d-none d-lg-block">
                            @php
                                $requiredItems = explode('|', $shortlink->required);
                            @endphp
                            @foreach($requiredItems as $required)
                                <li>
                                    <span class="fas fa-circle" data-fa-transform="shrink-12"></span>
                                    <span>{{ $required }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-between flex-column">
                        <div>


                    <div class="d-none d-lg-block">
                        
                        <p class="fs--1 mb-1">Claims: <strong>{{$visited_this}}/{{$shortlink->visits}}</strong></p>
                    @if($finished_checker == 'yes')
                        <p class="fs--1 mb-1">Status: <strong class="text-success">Completed</strong></p>
                    @elseif($finished_checker == 'no')



@if (count($prepare) > 0)

   <p class="fs--1 mb-1">Status: <strong class="text-warning">Waiting..</strong></p>

@else
                        <p class="fs--1 mb-1">Status: <strong class="text-info">Available</strong></p>
@endif



                    @endif
                        </div>


                        </div>
                        <div class="mt-2">

    <button class="btn btn-falcon-{{ count($prepare) > 0 ? 'warning' : 'success' }} d-block visit" 
            type="button"
            {{ $finished_checker == 'yes' ? 'disabled' : '' }} 
            data-link-index="{{ $LinkIndex }}"
            data-link-id="{{ $allValues[$index] }}"
            onclick="">
        <span class="fa fa-globe"></span> 
        <span>Visit</span>
    </button>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



              </div>
            </div>

            <div class="card-footer border-top d-flex justify-content-center">
                <label style="margin: -6px;">Total Tasks : {{ count(session('Shortlinks')) }}</label>
            </div>
          </div>
          

          <div class="card mb-3" style="margin-top:15px;">

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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function () {

        $('.visit').on('click', function() {
        $('.visit').addClass('d-none');
        

        var LinkIndex = $(this).data('link-index');
        var LinkId = $(this).data('link-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/session',
            type: 'POST',
            data: { data: LinkId, '_token': csrfToken},
            success: function(response) {
                window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}/' + LinkIndex;
            },
            error: function(error) {
                window.location.href = '/shortlink/{{ strtolower(session('PageUnit')) }}';
            }

        });

});

        });
    </script>


@endsection
