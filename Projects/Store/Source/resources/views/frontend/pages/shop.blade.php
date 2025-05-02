
<!-- {{ asset('frontend/main_assets/') }} new -->

<!-- Calling The DB to Edit Website Seo Settings -->
<!-- meta_title meta_author meta_keyword meta_description -->
@php
$seo = App\Models\Seo::find(1);

$Sort = isset($_COOKIE['Sort']) ? $_COOKIE['Sort'] : 'new';
$Items = isset($_COOKIE['ItemsPage']) ? $_COOKIE['ItemsPage'] : '6';

$lower = '';
$upper = '';

if(isset($_COOKIE['lower']) && isset($_COOKIE['upper'])){
    $lower = $_COOKIE['lower'];
    $upper = $_COOKIE['upper'];
}


$CategoryParam = request()->has('category') ? ['category' => request()->input('category')] : [];

$SubCategoryParam = request()->has('subcategory') ? ['subcategory' => request()->input('subcategory')] : [];

$BrandParam = request()->has('brand') ? ['brand' => request()->input('brand')] : [];

$ColorParam = request()->has('color') ? ['color' => request()->input('color')] : [];
@endphp
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
     @include('frontend.body.header')
    <!-- Author Meta -->
    <meta name="author" content="{{ $seo-> meta_author }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ $seo-> meta_description }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $seo-> meta_keyword }}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Shop</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/main_assets/css/main.css') }}">

    <!--
        Font
        ============================================= -->

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/linearicons-v1.0.0/icon-font.min.css') }}">


    @include('frontend.body.quickview')
</head>

<body id="category">


	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">


            @include('frontend.body.nav')


        </div>

    </header>
    <!-- End Header Area -->

  <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="/shop/?page=1">Shop</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">


				<div class="sidebar-categories">


					<div class="head">Browsing</div>
					
					<ul class="main-categories">

<li class="main-nav-list">
<a data-toggle="collapse" href="#Categories" aria-expanded="false" aria-controls="Categories">
Categories
<span class="number">{{ count($Categories)}}</span>
<i style="float: right; line-height: inherit;" class="fa fa-arrow-down"></i>
</a>


<ul class="collapse" id="Categories" data-toggle="collapse" aria-expanded="false" aria-controls="Categories">

<!-- /shop/?page=1&category=2 -->
@foreach($Categories as $category)
<!-- #{{ $category->category_name }} -->
    <li class="main-nav-list">
        <a data-toggle="collapse" href="#{{ $category->category_name }}" aria-expanded="false" aria-controls="{{ $category->category_name }}">
            <span class="category-name" data-url="{{ route('shop', ['page' =>1,'category'=> $category->id]) }}">{{ $category->category_slug}}</span>
            <span class="number">{{ count($category->Products) }}</span>
            <i style="float: right; line-height: inherit;" class="fa fa-arrow-down category-arrow"></i>
        </a>

        <ul class="collapse" id="{{ $category->category_name }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $category->category_name }}">
            @php
                $totalCategoryProducts = count($category->Products);
            @endphp

            @foreach($category->Subcategory as $subCategory)
                <li class="main-nav-list child">
                    @php
                         // Count products for this subcategory within the current category
                        $subcategoryProductsCount = $category->Products->where('subcategory', $subCategory->id)->count();
                    @endphp

                    <a class="category-sub" href="{{ route('shop', ['page' =>1,'category' => $category->id,'subcategory'=> $subCategory->id]) }}">
                        {{ $subCategory->subcategory_slug}}
                        <span class="number">{{ $subcategoryProductsCount }}</span>
                    </a>
                    @php
                   		// Remaining items {Subcategories} in Categories, not have any Categories 
                        $totalCategoryProducts -= $subcategoryProductsCount;
                    @endphp
                </li>
            @endforeach

<!--             {{-- Display the remaining count for the category --}}
            <li class="main-nav-list child">
                <a class="category-sub" href="#">
                    Remaining
                    <span class="number">{{ $totalCategoryProducts }}</span>
                </a>
            </li> -->
        </ul>
    </li>
@endforeach
					</ul>
				</li>
				</ul>

				</div>
<!-- Categories -->



				<div class="sidebar-filter mt-50">
					

							
<div class="sidebar-categories">

<div class="head">Brands</div>


<ul class="main-categories">

    <li class="main-nav-list"><a data-toggle="collapse" href="#Brands" aria-expanded="false" aria-controls="Brands"><span
                                 class="lnr lnr-arrow-right"></span>Brands<span class="number">{{ count($Brands) }}</span>
                             <i style="float: right; line-height: inherit;" class="fa fa-arrow-down category-arrow"></i></a>
                            <ul class="collapse" id="Brands" data-toggle="collapse" aria-expanded="false" aria-controls="Brands">


            @foreach($Brands as $brand)
                @php
                $brandProducts = App\Models\Product::where('brand_id', $brand->id)->get();
                $brandColors = []; 

                // Loop through brand products to collect unique colors
                foreach ($brandProducts as $product) {
                    $colors = explode(',', $product->product_color);
                    $brandColors = array_merge($brandColors, array_map('trim', array_map('strtolower', $colors)));
                }

                // Filter and keep only unique colors
                $brandColors = array_unique($brandColors);
                @endphp

                <li class="main-nav-list">
                    <a data-toggle="collapse" href="#brand{{ $brand->id }}" aria-expanded="false" aria-controls="brand{{ $brand->id }}">
                        <!-- Add the .brand-link class to the brand link -->
                        <span class="brand-name" data-url="{{ route('shop', ['page' =>1,'brand'=> $brand->id]) }}"
                        	>{{ $brand->brand_slug }}</span>
                        
                        <span class="number">{{ count($brandColors) }}</span>
                        <i style="float: right; line-height: inherit;" class="fa fa-arrow-down category-arrow"></i>
                    </a>
                    <ul class="collapse" id="brand{{ $brand->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="brand{{ $brand->id }}">
                        @foreach($brandColors as $color)
                            <li class="main-nav-list child">
                                <a class="brand-sub" href="{{ route('shop', ['page' =>1,'brand' => $brand->id,'color'=>  ucfirst ($color) ]) }}"
                                	>
                                	<!-- href="{{ url('shop/product/' .$brand->brand_name .'/color/'.$color) }}" -->

                                    {{ ucfirst ($color) }}

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
    <!--  -->
    <!--  -->

                            </ul>
                        </li>
</ul>



                </div>


<!-- Brands -->



					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>

							</div>
						<div id="filter_price_btn" style=" margin:12px; width: 100%; text-align:center;justify-content: center;" class="cupon_text d-flex align-items-center">
                                        <a style='color:white;' class="primary-btn" >Filter Price</a>
                                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">

<div class="sorting">
    <select>
        <option value="desc" class="newest_items" <?php if ($Sort == 'new') echo 'selected';?> >The Newest</option>
        <option value="asc" class="oldest_items" <?php if ($Sort == 'old') echo 'selected';?> >The Oldest</option>
    </select>
</div>

					<div class="sorting mr-auto">
						<select>
							<option value="6" <?php if ($Items == '' || $Items == '6') echo 'selected';?> >Show 6 Items</option>
							<option value="12"<?php if ($Items == '12') echo 'selected';?> >Show 12 Items</option>
						</select>
					</div>
					
					<div class="pagination">
						@for ($Page = 1; $Page <= $TotalPages; $Page++)
		<!-- <a href="{{ url('shop/?page=' . $Page)}}" @if($Page == $CurrentlyPage) class='active' @endif>{{ $Page}}</a> -->
		<a href="{{ route('shop', array_merge(['page' => $Page], $CategoryParam, $SubCategoryParam, $BrandParam, $ColorParam)) }}" @if($Page == $CurrentlyPage) class='active' @endif>{{ $Page}}</a>
						@endfor
					</div>

				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">


@foreach($CurrentlyPageProducts as $product)

						<!-- single product -->
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								
								<img 

								    data-name = "{{ $product['product_name'] }}"
    								data-img = "{{ $product['product_thumbnail'] }}"
    								data-desc = "{{ $product['short_desc'] }}"
    								data-price = "{{ $product['product_price'] }}"
    								data-disc = "{{ $product['discount_price'] }}"
    								data-code = "{{ $product['product_code'] }}"

    								onclick="openQuickViewModal(this)"

								class="img-fluid" src="{{ asset('/frontend/' . $product['product_thumbnail'] ) }}" alt="">


								<div class="product-details">
									<h6>{{ $product['product_name']}}</h6>
									<div class="price">
										<h6>${{ $product['product_price']}}</h6>
										<h6 class="l-through">${{ $product['discount_price']}}</h6>
									</div>
									<div class="prd-bottom">

<!-- 										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a> -->
                                    <a style="cursor: pointer;" data-product-id="{{$product['id'] }}" class="social-info add-wishlist-btn">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
										<a style="cursor: pointer;" data-product-id="{{$product['id']}}" class="social-info add-compare-btn">
											<span class="lnr lnr-eye"></span>
											<p class="hover-text">compare</p>
										</a>
										<a href="/shop/product/details/{{$product['id']}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
@endforeach

					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					
<div class="sorting">
    <select>
        <option value="desc" class="newest_items" <?php if ($Sort == 'new') echo 'selected';?> >The Newest</option>
        <option value="asc" class="oldest_items" <?php if ($Sort == 'old') echo 'selected';?> >The Oldest</option>
    </select>
</div>


					<div class="sorting mr-auto">
						<select>
							<option value="6" <?php if ($Items == '' || $Items == '6') echo 'selected';?> >Show 6 Items</option>
							<option value="12"<?php if ($Items == '12') echo 'selected';?>>Show 12 Items</option>
						</select>
					</div>
					


					<div class="pagination">
						@for ($Page = 1; $Page <= $TotalPages; $Page++)
		<!-- <a href="{{ url('shop/?page=' . $Page)}}" @if($Page == $CurrentlyPage) class='active' @endif>{{ $Page}}</a> -->
		<a href="{{ route('shop', array_merge(['page' => $Page], $CategoryParam, $SubCategoryParam, $BrandParam, $ColorParam)) }}" @if($Page == $CurrentlyPage) class='active' @endif>{{ $Page}}</a>
						@endfor
					</div>

				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-9">
                    <div class="row">

                        @foreach($deal as $deal)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img width="70" height="70" src="{{ asset('frontend/' .$deal->product_thumbnail) }}" alt=""></a>
                                <div class="desc">
                                    <a href="/shop/product/details/{{ $deal->product_code }}" class="title">{{$deal->product_name}}</a>
                                    <div class="price">
                                        <h6>${{$deal->product_price}}</h6>
                                        <h6 class="l-through">${{$deal->discount_price}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="{{ $banners[0]->url }}" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('frontend/main_assets/img/category/c5.jpg') }}" alt="">
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End related-product Area -->



@include('frontend.body.footer')

@include('frontend.body.cart')




<script type="text/javascript">


  var lower = @json($lower);
  var upper = @json($upper);


document.addEventListener('DOMContentLoaded', function() {

	const currently = document.querySelectorAll('.current'); // Select All .Current Span


	currently.forEach(currently => {

		// Geting contet text of selected Option

		let previous_content = currently.textContent;


		function check4changes() {
			// body...

			if (currently.textContent !== previous_content){

			previous_content = currently.textContent;


			if(currently.textContent === 'The Newest'){
				document.cookie = 'Sort=new; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
					window.location.reload();
			}else if(currently.textContent === 'The Oldest'){
				document.cookie = 'Sort=old; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
					window.location.reload();
			}else if(currently.textContent === 'Show 6 Items'){
				document.cookie = 'ItemsPage=6; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
					window.location.reload();
			}else if(currently.textContent === 'Show 12 Items'){
				document.cookie = 'ItemsPage=12; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
					window.location.reload();
			}
		
			}

		}


		setInterval(check4changes, 100); // Starting automatic timer when text changes 1/Sec = 1000 Ml



	});


 

        if(document.getElementById("price-range")){
        
        var nonLinearSlider = document.getElementById('price-range');
          const lowerValueElement = document.getElementById("lower-value");
  const upperValueElement = document.getElementById("upper-value");
  
        noUiSlider.create(nonLinearSlider, {
            connect: true,
            behaviour: 'tap',
            start: [ lower, upper ],
            range: {
                // Starting at 500, step the value by 500,
                // until 4000 is reached. From there, step by 1000.
                'min': [ 0 ],
                '10%': [ 500, 500 ],
                '50%': [ 4000, 1000 ],
                'max': [ 10000 ]
            }
        });


        var nodes = [
            document.getElementById('lower-value'), // 0
            document.getElementById('upper-value')  // 1
        ];

        // Display the slider value and how far the handle moved
        // from the left edge of the slider.
        nonLinearSlider.noUiSlider.on("update", function (values, handle) {
    const value = parseFloat(values[handle]);
    if (handle === 0) {
      lowerValueElement.textContent = value.toFixed(2);
      // console.log("Lower Value: " + value);
      lower = value;
    } else {
      upperValueElement.textContent = value.toFixed(2);
      // console.log("Upper Value: " + value);
      upper = value;
    }



  });

        }


});

var filter_btn = document.getElementById('filter_price_btn');

filter_btn.addEventListener("click", function() {

      	document.cookie = 'lower=' + lower + '; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
    	document.cookie = 'upper=' + upper + ' ; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
    	lower = '';
    	upper = '';
    	window.location.reload();

});








</script>



</body>

</html>

