    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            {{$seo->meta_about}}.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form method="POST" action="{{ route('newsletter.submit') }}" novalidate="true" class="form-inline">

                                @csrf
                                <div class="d-flex flex-row">

                                    <input class="form-control" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" name="email"
                                     required="" type="email" >


                                    <button type="submit" class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
<!--                                     <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div> -->

                                    <!-- <div class="col-lg-4 col-md-4">
                                                <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                            </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">

                        <div style="display: flex; justify-content:flex-start;">
<h6 class="mb-20">Our Feed&nbsp:&nbsp</h6>
 <a style="color:white;" href="/blog">Blogs</a>
                        </div>
                        
                        <ul style="margin-top: 10px;" class="instafeed d-flex flex-wrap">

                            @foreach($feeds as $feed)
                        <li>
                        <a href="/blog/view/{{$feed->id}}">
                    <img height="58" width="58" src="{{ asset('frontend/upload/blogs/thumbnail/' .$feed->thumbnail) }}" alt="">
                        </a>
                        </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="{{$seo->meta_social_1}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$seo->meta_social_2}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$seo->meta_social_3}}"><i class="fa fa-dribbble"></i></a>
                            <a href="{{$seo->meta_social_4}}"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="{{$seo->meta_website}}">{{$seo->meta_title}}</a>
</p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <script src="{{ asset('frontend/main_assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
     crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/main_assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/main_assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/main_assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/extra/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/main_assets/js/nouislider.min.js') }}"></script>

  

    <script src="{{ asset('frontend/main_assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/main_assets/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
<!--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/main_assets/js/gmaps.min.js') }}"></script> -->
    <script src="{{ asset('frontend/main_assets/js/main.js') }}"></script>


   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
   
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/fonts/iconic/css/material-design-iconic-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/extra/css/main.css')}}">

    <script src="{{ asset('frontend/extra/js/jquery.magnific-popup.min.js') }}"></script>
    
      <script src="{{ asset('frontend/extra/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('frontend/extra/js/main.js')}}"></script>