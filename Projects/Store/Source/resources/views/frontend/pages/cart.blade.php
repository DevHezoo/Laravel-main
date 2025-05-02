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
    <title>Carts</title>
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

	<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/cart">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

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
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>



@foreach(Cart::content() as $item)

                            <tr id="Cart-item-id-{{ $item->rowId }}">

                                <td>
                                    <div class="media">
           <div  class="header-cart-item-img remove-cart" data-row-id="{{ $item->rowId }}" data-qty="{{ $item->qty }}">
            <img height="70" width="70" style="border-radius: 10px;" src="{{ $item->options->image_url }}" alt="IMG">
        </div>


                                   <!--      <div class="d-flex">
                                            <img width="70" height="70" src="{{ $item->options->image_url}}" alt="">
                                        </div> -->
                                        <div class="media-body">
                                            <p>{{Illuminate\Support\Str::limit($item->name, 15, '..!')}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{$item->price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="item-cart-{{ $item->rowId }}" maxlength="12" minlength="1" value="{{ $item->qty }}" title="Quantity:"
                                            class="input-text qty">
                                        <button onclick="increaseQty('{{ $item->rowId }}');"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="decreaseQty('{{ $item->rowId }}');"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 id='total-price-{{ $item->rowId}}'>${{ number_format($item->price * $item->qty, 2) }}</h5>
                                </td>
                            </tr>

@endforeach
</div>



                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5 id='total_item_price'> ${{ Cart::total() }}</h5>
                                </td>
                             
                            </tr>


     


             <tr class="out_button_area bottom_button">
                                <td>
                                    <a hidden class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input style="width:150px;" type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
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
                                        <a class="gray_btn" href="/shop/?page=1">Continue Shopping</a>
                                        <a class="primary-btn" href="/checkout">Proceed to CheckOut</a>
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

@include('frontend.body.footer')
@include('frontend.body.cart')
</body>

</html>