@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
 
@include('frontend.body.header')
<title>{{ $seo-> meta_title }} > Live</title>
@include('frontend.body.icon')
@include('frontend.body.init')

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

@include('frontend.body.extra.header')


    <main id="main">





      <div class="hero-section inner-page">
        <div class="wave">

          <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path
                  d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                  id="Path"></path>
              </g>
            </g>
          </svg>

        </div>



        
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['Live_Signals'] }}</h1>
                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100">{{ $translations['Live_Signals_Description'] }}</p>  
                </div>
              </div>
            </div>
          </div>
        </div>


</div>




      <div class="site-section">
        <div class="container">

          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-5" data-aos="fade-up">
              <h2 class="section-heading">{{ $translations['Our_Provided_Signals'] }}</h2>
            </div>
          </div>

                

<div class="progress-table-wrap">
                    <div class="progress-table" style="max-height: 275px">
                        <div class="table-head">
<div class="Id">#</div>
<div class="Total">{{ $translations['Name'] }}</div>
<div class="Date">{{ $translations['Date'] }}</div>
<div class="Status">{{ $translations['Status'] }}</div>
<div class="Action">{{ $translations['Type'] }}</div>
<div class="Action">{{ $translations['Action'] }}</div>
</div>


@if(count($signals) > 0)

    @php $count = 0 @endphp
    @auth
    @php $type = $user->type @endphp
    @endauth


    @foreach($signals as $signal)
    @auth

@if($signal->signal_type === 1 && $type >= $signal->signal_type)

                    <div class="table-row">
                    <div style="font-weight: bold;" class="Id">{{ ++$count }}</div>
                    <div class="Total">{{$signal->name}}</div>
                    <div class="Date">{{$signal->date}}</div>
                    <div class="Action">
                        <a style="color:green;font-weight: bold;">{{$signal->status}}</a>
                    </div>
                    <div class="Action">
                        <a style="font-weight: bold;">{{$signal->type}}</a>
                    </div>
                    <div class="Action">
                        <a style="color:dark;font-weight: bold;" href="signalv1/view/{{$signal->id}}">{{ $translations['View'] }}</a>
                    </div>
                </div>

@elseif($signal->signal_type === 2 && $type >= $signal->signal_type)

                    <div class="table-row">
                    <div style="font-weight: bold;" class="Id">{{ ++$count }}</div>
                    <div class="Total">{{$signal->name}}</div>
                    <div class="Date">{{$signal->date}}</div>
                    <div class="Action">
                        <a style="color:green;font-weight: bold;">{{$signal->status}}</a>
                    </div>
                    <div class="Action">
                        <a style="font-weight: bold;">{{$signal->type}}</a>
                    </div>
                    <div class="Action">
                        <a style="color:dark;font-weight: bold;" href="signalv2/view/{{$signal->id}}">{{ $translations['View'] }}</a>
                    </div>
                </div>

@elseif($signal->signal_type === 3 && $type >= $signal->signal_type)

                    <div class="table-row">
                    <div style="font-weight: bold;" class="Id">{{ ++$count }}</div>
                    <div class="Total">{{$signal->name}}</div>
                    <div class="Date">{{$signal->date}}</div>
                    <div class="Action">
                        <a style="color:green;font-weight: bold;">{{$signal->status}}</a>
                    </div>
                    <div class="Action">
                        <a style="font-weight: bold;">{{$signal->type}}</a>
                    </div>
                    <div class="Action">
                        <a style="color:dark;font-weight: bold;" href="signalv3/view/{{$signal->id}}">{{ $translations['View'] }}</a>
                    </div>
                </div>

@elseif($signal->signal_type === 4 && $type >= $signal->signal_type)

                    <div class="table-row">
                    <div style="font-weight: bold;" class="Id">{{ ++$count }}</div>
                    <div class="Total">{{$signal->name}}</div>
                    <div class="Date">{{$signal->date}}</div>
                    <div class="Action">
                        <a style="color:green;font-weight: bold;">{{$signal->status}}</a>
                    </div>
                    <div class="Action">
                        <a style="font-weight: bold;">{{$signal->type}}</a>
                    </div>
                    <div class="Action">
                        <a style="color:dark;font-weight: bold;" href="signalv4/view/{{$signal->id}}">{{ $translations['View'] }}</a>
                    </div>
                </div>
@endif
@else
@if($signal->signal_type === 1)
                    <div class="table-row">
                    <div style="font-weight: bold;" class="Id">{{ ++$count }}</div>
                    <div class="Total">{{$signal->name}}</div>
                    <div class="Date">{{$signal->date}}</div>
                    <div class="Action">
                        <a style="color:green;font-weight: bold;">{{$signal->status}}</a>
                    </div>
                    <div class="Action">
                        <a style="font-weight: bold;">{{$signal->type}}</a>
                    </div>
                    <div class="Action">
                        <a style="color:dark;font-weight: bold;" href="signalv1/view/{{$signal->id}}">{{ $translations['View'] }}</a>
                    </div>
                </div>
@endif 
@endauth
@endforeach



@else
    <div class="table-row">
        <div style="width: 100%;text-align: center;justify-content: center;font-weight: bold;margin-top: 10px;" colspan="6">{{ $translations['no_signals'] }}</div>
    </div>
@endif




 </div>
</div>




        </div>
      </div> <!-- .site-section -->

  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')

</body>

</html>
