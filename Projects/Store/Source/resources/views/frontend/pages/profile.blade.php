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
    <title>Profile</title>

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


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>My Profile</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/user/profile">Profile</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

  


 

    <!--================Blog Area =================-->
    <br>

<form method="post" action="{{ route('user.profile.update.information') }}" enctype="multipart/form-data" role="form">
@csrf

    <section class="blog_area">
        <div class="container">
            <div class="row">




                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
               
                        <aside class="single_sidebar_widget author_widget">


<style type="text/css">
.design-name{
  color:red;
}
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #ffba00;
  position: absolute;
  top: 5px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #ffba00;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

}

</style>

    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">

            
<div id="imagePreview" style="background-image: url('{{ (!empty($userData->photo)) ? url('frontend/upload/user_images/'.$userData->photo) : url('frontend/upload/no_image.jpg') }}');">
</div>

          
        </div>
     
    </div>


                            <h4>{{ $userData->name }}</h4>
                            <p>{{ $userData->username }}</p>
                            <div class="social_icon">
                                <!-- Tenary Condition (if statment shortly) -->
    <a href="{{ !empty($userData->social_link) ? url($userData->social_link) : url('/user/profile') }}">

                                    <i class="fa fa-user"></i></a>

                            </div>
                            <p>{{ $userData->vendor_short_info }}</p>
                            <div class="br"></div>


                        </aside>




                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">My Informations</h4>
                       
    

<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input type="text" name="social_link" class="form-control custom-read-only" id="inlineFormInputGroup" placeholder="Enter Social Link"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contact link'"
            value="{{ $userData->social_link }}">
    </div>

</div>


<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input readonly type="text" name="name" class="form-control custom-read-only" id="inlineFormInputGroup" placeholder="Enter Full Name"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Full Name'"
            value="{{ $userData->name }}">
    </div>
    
</div>


<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input type="text" name="phone" class="form-control custom-read-only" id="inlineFormInputGroup" placeholder="Enter Phone Number"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'"
            value="{{ $userData->phone }}">
    </div>
 
</div>

<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input type="text" name="address" class="form-control custom-read-only" id="inlineFormInputGroup" placeholder="Enter Address"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'"
            value="{{ $userData->address }}">
    </div>

</div>

<button type="submit" class="bbtns" name="submit">Update</button>
                        </aside>


<!--  -->
<!--  -->


                    </div>
                </div>


<div class="col-lg-8">

<h3 style="margin:10px 0px;" class="mb-30">Orders</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table" style="max-height: 275px">
                        <div class="table-head">
<div class="Id">No.</div>
<div class="Date">Date</div>
<div class="Total">Totally</div>
<div class="Payment">Payment</div>
<div class="Invoice">Invoice</div>
<div class="Status">Status</div>
<div class="Action">View</div>
<div class="Action">Action</div>
</div>

@if(count($orders) > 0)
@foreach($orders as $order)
<div class="table-row">
<div style="font-weight: bold;" class="Id">{{$order->id}}</div>
<div class="Date">{{$order->order_date}}</div>
<div class="Total">{{$order->amount}}$</div>
<div class="Payment">{{$order->payment_method}}</div>
<div class="Invoice">{{$order->invoice_no}}</div>
<div class="Status">{{$order->status}}</div>
<div class="Action">
<a style="color:darkgreen;font-weight: bold;" href="/order/view/{{$order->order_number}}">View</a>
</div>
<div class="Action">

<!-- Let's Check if status->pending Then Will Can be Clickable, Else can't click     -->
@if($order->status === "pending")
<a style="color:maroon;font-weight: bold;" href="/order/cancel/{{$order->order_number}}">Cancel</a>
@else
<a style="color:gray;font-weight: bold;">Cancel</a>
@endif
</div>
</div>
@endforeach
@else
<div class="table-row">
    <div style="width: 100%;text-align: center;justify-content: center;font-weight: bold;margin-top: 10px;" colspan="8">No Data</div>   
 </div>
@endif 

 </div>
</div>


<!--  -->
<br>

<h3 style="margin:10px 0px;" class="mb-30">Return Orders</h3>
 <div class="progress-table-wrap">
                    <div class="progress-table" style="max-height: 275px">
                        <div class="table-head">
<div class="Id">No.</div>
<div class="Date">Date</div>
<div class="Total">Totally</div>
<div class="Payment">Payment</div>
<div class="Invoice">Invoice</div>
<div class="Status">Status</div>
<div class="Action">Action</div>
</div>


@if(count($orders_return) > 0)
@foreach($orders_return as $return)
<div class="table-row">
<div style="font-weight: bold;" class="Id">{{$return->id}}</div>
<div class="Date">{{$return->order_date}}</div>
<div class="Total">{{$return->amount}}$</div>
<div class="Payment">{{$return->payment_method}}</div>
<div class="Invoice">{{$return->invoice_no}}</div>
<div class="Status">{{$return->status}}</div>
<div class="Action">
<a style="color:darkgreen;font-weight: bold;" href="/order/reurn/{{$return->order_number}}">Return</a>
</div>
</div>
@endforeach
@else
<div class="table-row">
    <div style="width: 100%;text-align: center;justify-content: center;font-weight: bold;margin-top: 10px;" colspan="7">No Data</div>   
 </div>
@endif 
</div>

</div>



<!--  -->
<br>
<br>

<div style="display: flex; justify-content: space-between;">
    <h3>Tickets</h3>
    <a href="/ticket/new">
        <h3 style="color: green; cursor: pointer; margin-left: auto;font-weight: bold;"> + </h3>
    </a>
</div>


 <div class="progress-table-wrap">
                    <div class="progress-table" style="max-height: 275px">
                        <div class="table-head">
<div class="Id">No.</div>
<div class="Subject">Subject</div>
<div class="Message">Message</div>
<div class="Ticket_Action">Action</div>
</div>



@if(count($tickets) > 0)
@foreach($tickets as $key => $ticket)
<div class="table-row">
<div style="font-weight: bold;" class="Id">{{$key + 1}}</div>
<div class="Subject">{{Illuminate\Support\Str::limit($ticket->subject, 18, '...')}}</div>
<div class="Message">{{Illuminate\Support\Str::limit($ticket->message, 60, '...')}}</div>
<div class="Ticket_Action">
<a style="color:darkgreen;font-weight: bold;" href="/ticket/view/{{$ticket->ticket_number}}">View</a>
</div>
</div>
@endforeach
@else
<div class="table-row">
    <div style="width: 100%;text-align: center;justify-content: center;font-weight: bold;margin-top: 10px;" colspan="7">No Data</div>   
 </div>
@endif 
</div>

</div>


            </div>









        </div>


    </section>
    <!--================Blog Area =================-->
</form>

  <!--================Blog Area =================-->
    <br>

<form method="post" action="{{ route('user.profile.update.password') }}" role="form">
@csrf


    <section class="blog_area">
        <div class="container">
            <div class="row">




                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
               




                        <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">My Password</h4>
                       


<div class="form-group d-flex flex-row">
    <div class="input-group">

<input type="password" name="old_password" class="form-control custom-read-only" id="current_password" placeholder="Password"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
            </div>
</div>




<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input type="password" name="new_password" class="form-control custom-read-only" id="new_password" placeholder="New Password"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
    </div>
 
</div>


<div class="form-group d-flex flex-row">
    <div class="input-group">

        <input type="password" name="new_password_confirmation" class="form-control custom-read-only" id="new_password_confirmation" placeholder="Confirm New Password"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm New Password'">
    </div>
 
</div>


<button type="submit" class="bbtns" name="submit">Update</button>
                        </aside>

                    </div>
                </div>





            </div>

        </div>


    </section>
    <!--================Blog Area =================-->
</form>
    
@include('frontend.body.footer')
@include('frontend.body.cart')


<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
      </script>  



</body>

</html>