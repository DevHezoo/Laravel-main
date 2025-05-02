    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section style="background-color: #3D4C6F">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="bg-primary text-white p-5 p-lg-6 rounded-3">
              <h4 class="text-white fs-1 fs-lg-2 mb-1">Sign up for email alerts</h4>
              <p class="text-white">Stay current with our latest insights</p>
            
            <form class="text-start mt-4" method="POST" action="{{ route('subscribe') }}" role="form">
            @csrf
                <div class="row align-items-center">
                  <div class="col-md-7 pe-md-0">
                    <div class="input-group"><input class="form-control" name="email" type="email" placeholder="Enter Email Here" /></div>
                  </div>
            
                  <div class="col-md-5 mt-3 mt-md-0">
                    <div class="d-grid"><button class="btn btn-warning" type="submit"><span class="text-primary fw-semi-bold">Submit</span></button></div>
                  </div>

                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="row">
              <div class="col-6 col-lg-4 text-white ms-lg-auto">
                <ul class="list-unstyled">
                  <li class="mb-3"><a class="text-white" type="button" onclick="window.location.href=''">Contact Us</a></li>
                  <li class="mb-3"><a class="text-white" type="button" onclick="window.location.href=''">FAQ</a></li>
                  <li class="mb-3"><a class="text-white" type="button" onclick="window.location.href=''">Privacy Policy</a></li>
                  <li class="mb-3"><a class="text-white" type="button" onclick="window.location.href=''">Terms of Use</a></li>
                </ul>
              </div>
              <div class="col-6 col-sm-5 ms-sm-auto">
                <ul class="list-unstyled">

                  <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" type="button" onclick="window.open('https://www.facebook.com/profile.php?id=100064750986906', '_blank')"> <span class="brand-icon me-3"><span class="fab fa-facebook-f"></span></span>
                      <h5 class="fs-0 text-white mb-0 d-inline-block">Facebook</h5>
                    </a></li>



                  <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" type="button" onclick="window.open('https://www.youtube.com/@talaka971', '_blank')"> <span class="brand-icon me-3"><span class="fab fa-youtube"></span></span>
                      <h5 class="fs-0 text-white mb-0 d-inline-block">Youtube</h5>
                    </a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->




    <footer class="footer bg-primary text-center py-4">
      <div class="container">
        <div class="row align-items-center opacity-85 text-white">
          <div class="col-sm-3 text-sm-start"><a href="/"><img width="111" height="32" src="{{ asset('frontend/assets/img/logo-light.png') }}" alt="logo" draggable="false"/></a></div>
          <div class="col-sm-6 mt-3 mt-sm-0">
            <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright 2024 {{session('Seo')->meta_title}}.</p>
          </div>
        </div>
      </div>
    </footer>

<p hidden class="d-none" id='web_uri'>{{session('Seo')->meta_website}}</p>
