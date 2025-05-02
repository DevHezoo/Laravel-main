<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

@php
$property_Details = App\Models\Property::where('id', $property->id)->first();
  
$left_property = '';

if (!$left) {
    // No order found, so available quantity is the total quantity
    $left_property = $property_Details->property_qty;
} else {
    // Order found, subtract its quantity from the total quantity
    $left_property = $property_Details->property_qty - $left->Property_ID;
}

// Now, $left_property holds the available quantity

 



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


<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Property Details</title>

    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')

        @php
            $propertyType = \App\Models\PropertyType::where('id', $property->property_type)->first();
        @endphp


  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a>  /  Single Property</span>
          <h3>Single - Property</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="{{ asset('frontend/' . $property->property_thumbnail) }}" alt="">
          </div>
          <div class="main-content">
            <span class="category">{{$propertyType->property_type}}</span>
            <h4>{{$property->property_slug}}</h4>
            {{$property->property_long_desc}}
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
        <div class="col-lg-4">
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

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Know More</h6>
            <h2>Loading Property Information!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">PROPERTY</button>
                  </li>

                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
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

<!--                           <li>
    Properties Left <span style="color: {{ $property_Details->property_qty > 0 ? 'green' : 'red' }}">
        [{{ $property_Details->property_qty }}/1]
    </span>
</li> -->

<li>Total Properties<span>{{ $property_Details->property_qty}}</span></li>

<!-- <li>Left<span>{{$left_property}}</span></li> -->

                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <img src="{{ asset('frontend/' . $property_Details->property_thumbnail) }}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>{{ $property_Details->property_title }}</h4>
                      <p>{{ $property_Details->property_short_desc }}</p>
                      <hr>
                      <p>Bedrooms: {{ $property_Details->property_bedroom }}</p>
                      <p>Bathrooms: {{ $property_Details->property_bathroom }}</p>
                      <p>Parking: {{ $property_Details->property_parking_spots }} spots</p>

@if($left_property <= 0)
<hr>
<p style="color:red;">Booking (this) Maybe be not available now.</p>
<!-- <p style="color:red;">Please come back later.</p> -->
@endif


    <div class="icon-button d-flex align-items-center justify-content-center">
        <a href="{{ url('order/details', $property_Details->id) }}"><i class="fa fa-calendar"></i>Booking</a>
    </div>

<!-- @if($left_property > 0)


@else

@endif -->



                    </div>
                  </div>
                </div>


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