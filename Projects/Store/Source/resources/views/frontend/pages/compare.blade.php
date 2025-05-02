<!-- {{ asset('frontend/main_assets/') }} -->

<!-- Calling The DB to Edit Website Seo Settings -->
<!-- meta_title meta_author meta_keyword meta_description -->
@php
$seo = App\Models\Seo::find(1);
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
    <title>Compare</title>
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

</head>

<body>


	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">


            @include('frontend.body.nav')


        </div>

    </header>
    <!-- End Header Area -->

<!-- == , equals to another vale
!== , not equals to another vale
=== equals equals -->


	<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Compare Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/compare">Compare</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->


@if(count($compare_items) > 0)
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                           
                            </tr>
                        </thead>
                        <tbody>
@php
$total = 0;
@endphp

<!-- $product : Fetching single product by his id, from wishlist to product db -->
@foreach($compare_items as $item)

@php
$product = App\Models\Product::where('id', $item->product_id)->first();
$total+= $product->product_price;
@endphp
                            <tr>

                                <td>
                                    <div class="media">
           <div  class="header-cart-item-img remove-compare" data-product-id='{{$product->id}}' >
            <img height="70" width="70" style="border-radius: 10px;" src="{{ url('frontend/'.$product->product_thumbnail) }}" alt="IMG">
        </div>

                                        <div class="media-body">
                                            <p>{{Illuminate\Support\Str::limit($product->product_slug, 15, '..!')}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{$product->product_price}}</h5>
                                </td>
                            </tr>

@endforeach
</div>




                            <tr>
                                <td>

                                </td>
                                <td>
                                    <h5 style="color:#777777">Total</h5>
                                </td>
                                <td>
                                    <h5> ${{ $total }}</h5>
                                </td>
                                <td>
                                    
                                </td>
                             
                            </tr>
     




                            <tr class="out_button_area bottom_button">
                                <td>
                                </td>
                                <td>
                                </td>
  	 							<td>
    							</td>
                                <td>
                                    
                                    <div class="cupon_text d-flex align-items-center">
                                        <a class="primary-btn" href="/">Back To Home</a>
                                    </div>

                                </td>
                            </tr>

                   


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@else
                                    <div style="width: 100%; display: flex; justify-content: center;text-align: center; margin:30px;" class="cupon_text d-flex align-items-center">
                                        <a class="primary-btn" href="/">Back To Home</a>
                                    </div>


@endif
@include('frontend.body.footer')
@include('frontend.body.cart')
</body>


    <!-- // Handle if click in cart element to show up the cart view -->
<script type="text/javascript">

$(document).ready(function(){



$('.header-cart-item-img.remove-compare').on('click', function() {

    // Ajax

var productid = $(this).data('product-id');

        $.ajax({ 
            type: 'POST',
            url: '{{ route("compare.remove", ["ProductID" => ":productid"]) }}'.replace(':productid', productid),
            data: { 
                ProductID: productid,
                 _token: '{{ csrf_token() }}' },
            success: function(response) {
            
            if (response.redirect) {
                toastr.success(response.message,'Success');

                window.location.href = response.redirect;

            }else {
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });



});

}); // Dom Ready, Page Loaded
</script>

</html>