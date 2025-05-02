<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sign-Up</title>

    @include('frontend.body.header')

  </head>

  <body style="user-select: none;">


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center py-0">
        <div class="bg-holder overlay overlay-1" style="background-image: url({{ asset('frontend/assets/img/background-1.jpg') }});"></div>
        <!--/.bg-holder-->
        <div class="container">
          <div class="row min-vh-100 align-items-center">
            <div class="col-md-9 col-lg-6 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <div style="margin-bottom: 1rem !important;" class="mb-5" data-zanim-xs='{"delay":0,"duration":1}'><a href="../index-2.html"><img src="{{ asset('frontend/assets/img/logo-light.png') }}" alt="logo" draggable="false"/></a></div>
              <div class="card" data-zanim-xs='{"delay":0.1,"duration":1}'>
                <div class="card-body p-md-5">
                  <h4 class="text-uppercase fs-0 fs-md-1">create your {{session('Seo')->meta_title}} account</h4>
                  <form class="text-start mt-4" method="POST" action="{{ route('register') }}" role="form">
                    @csrf
                    <div class="row align-items-center g-4">
                      <div class="col-6"> <input class="form-control" type="text" name="firstname" placeholder="First name" aria-label="First Name" /></div>
                      <div class="col-6"><input class="form-control" type="text" name="lastname" placeholder="Last name" aria-label="Last Name" /></div>
                      <div class="col-8"><input class="form-control" type="email" name="email" placeholder="Email Address" aria-label="Email Address" /></div>
                      <div class="col-4">
                      <select class="form-control" name="gender" id="gendor"></select>         
                      </div>

                      <div class="col-12">
                          <div class="input-group">
                              <input class="form-control" type="tel" name="phone" placeholder="Phone Ex: +12345.." aria-label="Phone Number" />

                          </div>
                      </div>

                      <div class="col-12"><input class="form-control" type="password" name="password" placeholder="Password" aria-label="Password" /></div>
                      <div class="col-12"><input class="form-control" type="password" name="confirm" placeholder="Confirm Password" aria-label="Confirm Password" /></div>
                    </div>
                    <div class="row align-items-center mt-3">
                      <div class="col-6 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" id="rememberMe" name="check" type="checkbox" value="checked" />
                            <label class="form-check-label text-500 lh-sm fw-semi-bold" for="rememberMe">I agree with the terms &amp; conditions</label>
                        </div>
                      </div>
                      <div class="col-6 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit">Create Account</button></div>


                    </div>

                  </form>



                  

                   

                </div>

<div class="d-flex justify-content-center align-items-center">
    <div class="col-md-auto mt-md-0 mt-4">
        <a style="color: #3b5998; cursor: pointer;" href="/sign-in">Have an Account</a>
    </div>
    <div class="col-md-auto mt-md-0 mt-4 mx-2">|</div>
    <div class="col-md-auto mt-md-0 mt-4">
        <a style="color: #3b5998; cursor: pointer;" href="/">Home</a>
    </div>
</div>


              </div>
            </div>
          </div>

        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

  
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('frontend.body.init')

<script type="text/javascript">
  var gendor = document.getElementById("gendor");
var gendors = {
  1: ["Male", 512],
  2: ["Female", 512],
};

for (var p in gendors){
  var option = document.createElement("option");
  option.textContent = gendors[p][0];
  option.value = p;
  gendor.appendChild(option);
}


</script>
  </body>

</html>