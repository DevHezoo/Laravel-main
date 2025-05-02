<!-- {{ asset('frontend/main_assets/') }} -->

@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Site Title -->
    <title>{{ $seo-> meta_title }} > Properties</title>

    @include('frontend.body.header')
  </head>

<body>

	@include('frontend.body.nav')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/">Home</a> / Properties</span>
          <h3>Properties</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
      <ul class="properties-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>

@foreach($types as $type)
        <li>
          <a href="#!" data-filter=".{{$type->id}}">{{$type->property_type}}</a>
        </li>

@endforeach

      </ul>

      <div class="row properties-box">


@foreach($Properties as $Property)

        @php
            $propertyType = \App\Models\PropertyType::where('id', $Property->property_type)->first();
        @endphp

        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 {{$Property->property_type}}">
          <div class="item">
            <a href="/property/details/{{$Property->id}}"><img src="{{ asset('frontend/' . $Property->property_thumbnail) }}" alt=""></a>
            <span class="category">{{$propertyType->property_type}}</span>
            <h6>${{$Property->property_price}}</h6>
            <h4><a>{{$Property->property_slug}}</a></h4>
            <ul>
              <li>Property Group ID : <span>{{ $Property->id }}</span></li>
              <li>Bedrooms: <span>{{$Property->property_bedroom}}</span></li>
              <li>Bathrooms: <span>{{$Property->property_bathroom}}</span></li>
              <li>Area: <span>{{$Property->property_area}} m2</span></li>
              <li>Floor: <span>{{$Property->property_floor}}</span></li>
              <li>Parking: <span>{{$Property->property_parking_spots}} spots</span></li>
            </ul>
            <div class="main-button">
              <a href="/property/details/{{$Property->id}}">View</a>
            </div>
          </div>
        </div>
@endforeach


      </div>

<!--       <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div> -->


    </div>
  </div>


 @include('frontend.body.footor')

  @include('frontend.body.extra')
  </body>
</html>