<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

@php
    $property = App\Models\Property::where('property_code', $feature->property_id)->first();

    $property_count = App\Models\Property::where('property_status', 'available')->count();



@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }}</title>
    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')


 
  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Dubai, <em>UAE</em></span>
          <h2>Hurry!<br>Get the Best Villa for you</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Dubai, <em>UAE</em></span>
          <h2>Be Quick!<br>Get the best villa in town</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Dubai, <em>UAE</em></span>
          <h2>Act Now!<br>Get the highest level penthouse</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">

             <img src="{{ asset('frontend/' . $property->property_thumbnail) }}" alt="">

            <a href="/properties"><img src="{{ asset('frontend/assets/images/featured-icon.png') }}" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>


            <h2>{{ $feature->property_title }}</h2>
          </div>
          <div class="accordion" id="accordionExample">
         
@if($property)
    @for ($i = 1; $i < 4; $i++)
        @php
            $propertyKey = 'property_collapse' . $i . '_que';
            $propertyValue = 'property_collapse' . $i . '_ans';
            $accordionId = 'collapse' . $i;
        @endphp

        @if($property->$propertyKey)

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $accordionId }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $accordionId }}" aria-expanded="true" aria-controls="{{ $accordionId }}">
                        {{ $property->$propertyKey }}
                    </button>
                </h2>
                <div id="{{ $accordionId }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $accordionId }}" data-bs-parent="#{{ $accordionId }}">
                    <div class="accordion-body">
                        {{ $property->$propertyValue }}
                    </div>
                </div>
            </div>

        @endif
    @endfor
@endif



          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-01.png') }}" alt="" style="max-width: 52px;">
                <h4>{{ $property->property_area }} m2<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-02.png') }}" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-03.png') }}" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>{{ ucfirst($property->property_payment)}}</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-04.png') }}" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Support</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="{{ asset('frontend/assets/images/video-frame.jpg') }}" alt="">
            <a href="{{ $seo->meta_video }}" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">

              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ $property_count }}" data-speed="1000"></h2>
                   <p class="count-text ">Available<br>Properties</p>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="1" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="5" data-speed="1000"></h2>
                  <p class="count-text ">Quality<br>Rated</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">


@foreach($deals as $deal)

        @php
            $propertyType = \App\Models\PropertyType::where('id', $deal->property_type)->first();
        @endphp

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-{{ $deal->property_type }}" data-bs-toggle="tab" data-bs-target="#{{ $deal->property_type }}" type="button" role="tab" aria-controls="{{ $deal->property_type }}" aria-selected="false">{{ $propertyType->property_type }}</button>
    </li>
@endforeach


                </ul>
              </div> 

              <div class="tab-content" id="myTabContent">


@foreach($deals as $deal)

@php
$property_Details = App\Models\Property::where('id', $deal->id)->first();

$floor = '';
        if ($property_Details->property_floor === 1) {
            $floor = '1st';
        } else if ($property_Details->property_floor === 2) {
            $floor = '2nd';
        } else if ($property_Details->property_floor === 3) {
            $floor = '3rd';
        } else {
            $floor = $property_Details->property_floor . 'th';
        }


@endphp


                <div class="tab-pane fade" id="{{ $deal->property_type }}" role="tabpanel" aria-labelledby="tab-{{ $deal->property_type }}">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>

                          <li>Property Group<span>{{ $property_Details->id }}</span></li>
                          <li>Flat Space<span>{{ $property_Details->property_area }} m2</span></li>
                          <li>Floor number<span>{{$floor}}</span></li>
                          <li>Number of rooms <span>{{ $property_Details->property_bedroom}}</span></li>
                          <li>Parking Available <span>{{ ucfirst($property_Details->property_parking_status)}}</span></li>
                          <li>Payment<span>{{ ucfirst($property_Details->property_payment)}}</span></li>
                          <li>Price<span>${{ $property_Details->property_price}}</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img style="border-radius: 10px;" src="{{ asset('frontend/' . $property_Details->property_thumbnail) }}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>{{ $property_Details->property_title }}</h4>
                    
                      <p>{{ $property_Details->property_long_desc }}</p>
                      <hr>
                      <div class="icon-button icon-button d-flex align-items-center justify-content-center">
                        <a href="/property/details/{{$property_Details->id}}"><i class="fa fa-calendar"></i>View</a>
                      </div>
                    </div>
                  </div>
                </div>
@endforeach
   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 @include('frontend.body.footor')

 @include('frontend.body.extra')
  </body>
</html>