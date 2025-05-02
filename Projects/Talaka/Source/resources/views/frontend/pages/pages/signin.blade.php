<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sign-In</title>

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
                  <form class="text-start mt-3" method="POST" action="{{ route('login') }}" role="form">
                    @csrf
                    <div class="row align-items-center g-3">
                      <div class="col-12"> <input class="form-control" type="email" name="email" placeholder="Email" aria-label="Email" /></div>
                      <div class="col-12"><input class="form-control" type="password" name="password" placeholder="Password" aria-label="Password" /></div>
                    </div>
                    <div class="col-12 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit">Enter</button></div>
                  </form>

                </div>

<div class="d-flex justify-content-center align-items-center">
    <div class="col-md-auto mt-md-0 mt-4">
        <a style="color: #3b5998; cursor: pointer;" href="/sign-up">Create an Account</a>
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

  </body>

</html>