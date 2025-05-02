@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.body.header')
@auth
<title>{{ $seo-> meta_title }} > Ticket</title>
@else
<title>{{ $seo-> meta_title }} > Contact</title>
@endauth

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
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['Profile'] }}</h1>
                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100">{{ $translations['Edit_Profile'] }}</p>  
                </div>
              </div>
            </div>
          </div>
        </div>

</div>


      <section class="site-section">
      <div class="container">
        <div class="row">
          








          <div class="col-md-8 blog-content">

                <form method="post" action="{{ route('user.profile.update.password') }}">
              @csrf
                  <div class="row">

                    <div class="col-md-12 form-group">
                      <label for="old_password">{{ $translations['Password'] }}</label>
                      <input type="password" class="form-control" name="old_password" id="old_password" data-rule="minlen:4"/>
                      <div class="validate"></div>
                    </div>

                    <div class="col-md-12 form-group">
                      <label for="new_password">{{ $translations['New_Password'] }}</label>
                      <input type="password" class="form-control" name="new_password" id="new_password" data-rule="minlen:4"/>
                      <div class="validate"></div>
                    </div>

                    <div class="col-md-12 form-group">
                      <label for="new_password_confirmation">{{ $translations['Confirm_New_Password'] }}</label>
                      <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" data-rule="minlen:4"/>
                      <div class="validate"></div>
                    </div>


    
                  <div class="col-md-12 form-group">
                    <input type="submit" value="{{ $translations['Save_Passowrd'] }}" class="btn btn-primary">
                  </div>

                  </div>
                </form>
          </div>





          <div class="col-md-4 sidebar">

                        <div class="sidebar-box">
              <h3>{{ $translations['Profile'] }}</h3>
              <p>{{ $translations['Edit_Profile'] }}</p>
            </div>


            <div class="sidebar-box">
              <form method="post" action="{{ route('user.profile.update.information') }}" enctype="multipart/form-data" role="form" class="search-form">
 
 @csrf

                <div class="form-group">

         <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">

            
<div id="imagePreview" style="background-image: 
url('{{ (!empty($user->photo)) ? url($user->photo) : url('frontend/upload/no_image.jpg') }}');">
</div>


          
        </div>
     
    </div>

<p style="text-align:center;">{{ $user->username }}</p>
                 
                 <input style="margin-bottom: 5px" type="text" class="form-control" readonly value="Role: {{$user->role}}">

                 <input style="margin-bottom: 5px" type="text" class="form-control" readonly value="{{$user->name}}">
            
                 <input style="margin-bottom: 5px" type="email" class="form-control" readonly value="{{$user->email}}">

                 <input style="margin-bottom: 5px" type="text" name='phone' class="form-control" placeholder="Type your phone" value="{{$user->phone}}">

                 <input style="margin-bottom: 5px" type="text" name='address' class="form-control" placeholder="Type your address" value="{{$user->address}}">

                 <input style="margin-bottom: 5px" type="text" name='social_link' class="form-control" placeholder="Type your social link" value="{{$user->social_link}}">


                </div>
                 <p style="text-align: center;">
                  
                  <button type="submit" class="btn btn-primary btn-sm" name="submit">{{ $translations['Save_Informations'] }}</button>
                </p>
              </form>
            </div>



          </div>
        </div>
      </div>
    </section>

  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')


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
