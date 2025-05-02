@extends('frontend.main.index')
@section('dashboard')


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="preloader" id="preloader">
        <div class="loader">
          <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
      <section class="py-0">
        <div class="swiper theme-slider min-vh-100" data-swiper='{"loop":true,"allowTouchMove":false,"autoplay":{"delay":5000},"effect":"fade","speed":800}'>
          <div class="swiper-wrapper">
            <div class="swiper-slide" data-zanim-timeline="{}">
              <div class="bg-holder" style="background-image: url({{ asset('frontend/assets/img/header-6.jpg') }});"></div>
              <!--/.bg-holder-->
              <div class="container">
                <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                  <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                    <div class="overflow-hidden">
                      <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Helping new users</h1>
                    </div>
                    <div class="overflow-hidden">
                      <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>We look forward to helping you take your opportunity to new heights to learn English with us.</p>
                    </div>

<!--                     <div class="overflow-hidden">
                      <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div> -->

                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-zanim-timeline="{}">
              <div class="bg-holder" style="background-image: url({{ asset('frontend/assets/img/header-5.jpg') }});"></div>
              <!--/.bg-holder-->
              <div class="container">
                <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                  <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                    <div class="overflow-hidden">
                      <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Experts</h1>
                    </div>
                    <div class="overflow-hidden">
                      <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>Over 5 years of experience in helping people to learn English as well.</p>
                    </div>
<!--                     <div class="overflow-hidden">
                      <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-zanim-timeline="{}">
              <div class="bg-holder" style="background-image: url({{ asset('frontend/assets/img/header-1.jpg') }});"></div>
              <!--/.bg-holder-->
              <div class="container">
                <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                  <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                    <div class="overflow-hidden">
                      <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Growing Community</h1>
                    </div>
                    <div class="overflow-hidden">
                      <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>Our network grows every day. Join us now.</p>
                    </div>
<!--                     <div class="overflow-hidden">
                      <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-nav">
            <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
            <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
          </div>
        </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-white text-center">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-10 col-md-6">
              <h3 class="fs-2 fs-lg-3">Welcome to {{session('Seo')->meta_title}}</h3>
              <p class="px-lg-4 mt-3">English Language Learning portal.</p>
              <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-0">
        <div class="container">
          <div class="row flex-center text-center pb-6">
            <div class="col-12">
              <div class="position-relative mt-4 py-5 py-md-11">
                <div class="bg-holder rounded-3" style="background-image: url({{ asset('frontend/assets/img/video-screenshot-2.jpg') }});"></div>
                <!--/.bg-holder-->
                <button class="btn-elixir-play" data-bigpicture="{&quot;ytSrc&quot;:&quot;re_K5hDjd1M&quot;}" data-zanim-trigger="scroll" data-zanim-xs='{"from":{"opacity":0,"scale":0.8},"to":{"opacity":1,"scale":1},"duration":1}'><span class="fas fa-play fs-1"></span></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-users"></span>Awesome Team</h5>
              <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>Before talking destination, we shine a spotlight across your organization <br /> to fully understand it.</p>
            </div>
            <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-comments"></span>Excellent Support</h5>
              <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>If you face any trouble, you can always let our dedicated support team help you. They are ready for you 24/7.</p>
            </div>
            <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-bolt"></span>Faster Performance</h5>
              <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>We develop a systematic well-ordered process of analysis, from concept through implementation.</p>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



   

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>
        <div class="container">
          <div class="text-center mb-7">
            <h3 class="fs-2 fs-md-3">Why Choose {{session('Seo')->meta_title}}</h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
          </div>
          <div class="row">
            <div class="col-lg-6 pe-lg-3"><img class="rounded-3 img-fluid" src="{{ asset('frontend/assets/img/why-choose-us.jpg') }}" alt="about" draggable="false"/></div>
            <div class="col-lg-6 px-lg-5 mt-6 mt-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <div class="overflow-hidden">
                <div class="px-4 px-sm-0" data-zanim-xs='{"delay":0}'>
                  <h5 class="fs-0 fs-lg-1"><span class="fas fa-comment-dots fs-1 me-2" data-fa-transform="flip-h"></span>We Are Professional</h5>
                  <p class="mt-3">We have many tools to bring the moon into your hands and raise you up with your English skills.</p>
                </div>
              </div>
              <div class="overflow-hidden">
                <div class="px-4 px-sm-0 mt-5" data-zanim-xs='{"delay":0}'>
                  <h5 class="fs-0 fs-lg-1"><span class="fas fa-palette fs-1 me-2" data-fa-transform="shrink-1"></span>We Are Creative</h5>
                  <p class="mt-3">Since we have more than 5 years of experience, we will lead you to know how effective our work is on you. You will be surprised by our roadmap to raise you up as well?</p>
                </div>
              </div>
              <div class="overflow-hidden">
                <div class="px-4 px-sm-0 mt-5" data-zanim-xs='{"delay":0}'>
                  <h5 class="fs-0 fs-lg-1"><span class="fas fa-stopwatch fs-1 me-2" data-fa-transform="grow-1"></span>24/7 Great Support</h5>
                  <p class="mt-3">You don't need support unless you find our community will help you too as well. Do not hesitate to contact us.</p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-primary py-6 text-center text-md-start">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md">
              <h4 class="text-white mb-0">If you have any query related Question... <br class="d-md-none" />we are available 24/7</h4>
            </div>
            <div class="col-md-auto mt-md-0 mt-4"><a class="btn btn-light rounded-pill" href="contact.html">Contact Us</a></div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->





      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-100 text-center">
        <div class="container">
          <div class="text-center mb-6">
            <h3 class="fs-2 fs-md-3">Global leadership</h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-4    ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-3.jpg') }}" alt="Reenal Scott" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>Reenal Scott</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Advertising Consultant</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>Reenal Scott is the Founder and CEO of Elixir, which he started from his dorm room in 2013 with 3 people only.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-4 mt-sm-0  ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-4.jpg') }}" alt="Lily Anderson" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>Lily Anderson</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Activation Consultant</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>Lily leads Elixir UK and oversees the company’s Customer Operations teams supporting millions ofr users.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-4  mt-lg-0 ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-5.jpg') }}" alt="Thomas Anderson" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>Thomas Anderson</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Change Management Consultant</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>As the VP of People, Thomas’s focus lies in the development and optimization of talent retention.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-4   ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-6.jpg') }}" alt="Legartha Mantana" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>Legartha Mantana</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Brand Management Consultant</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>As General Counsel of Elixir, Tony oversees global legal activities and policies across all aspects.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-4   ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-7.jpg') }}" alt="John Snow" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>John Snow</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Business Analyst</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>John has overseen the meteoric growth while protecting scaling its uniquely creative and culture.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-4   ">
              <div class="card h-100"><img class="card-img-top" src="{{ asset('frontend/assets/img/portrait-1.jpg') }}" alt="Ragner Lothbrok" draggable="false"/>
                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="overflow-hidden">
                    <h5 data-zanim-xs='{"delay":0}'>Ragner Lothbrok</h5>
                  </div>
                  <div class="overflow-hidden">
                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'>Business Consultant</h6>
                  </div>
                  <div class="overflow-hidden">
                    <p class="py-3 mb-0" data-zanim-xs='{"delay":0.2}'>Ragner, SVP of Engineering, oversees Elixir’s vast engineering organization which drives the core programming.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>
        <div class="bg-holder overlay overlay-elixir" style="background-image: url({{ asset('frontend/assets/img/background-15.jpg') }});"></div>
        <!--/.bg-holder-->
        <div class="container">
          <div class="d-flex"><span class="me-3"> <img src="{{ asset('frontend/assets/img/checkmark.png') }}" alt="checkmark" style="width: 55px" draggable="false"/></span>
            <div class="flex-1">
              <h2 class="text-warning fs-3 fs-lg-4">Take the right step,<br /><span class="text-white">do the big things.</span></h2>
              <div class="row mt-4 pe-lg-10">
                <div class="overflow-hidden col-md-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":{{session('Users')}}}'>0</div>
                  <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Total User's</h6>
                </div>
                <div class="overflow-hidden col col-lg-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":{{ \Illuminate\Support\Facades\DB::table('users')
    ->where('last_seen', '>=', now()->subMinutes(3))
    ->count() }}, "duration": 10}'>0</div>
                  <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Total Online</h6>
                </div>
                <div class="w-100 d-flex d-lg-none"></div>
                <div class="overflow-hidden col col-lg-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":{{ session('Days') }}}'>0</div>
                  <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Total Day's</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-white">
        <div class="container">
          <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":1,"autoplay":{"delay":5000}}'>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="row px-lg-8">
                  <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="{{ asset('frontend/assets/img/client1.png') }}" alt="Member" draggable="false"/></div>
                  <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                    <p class="lead">Their work on our website and Internet marketing has made a significant different to our business. We’ve seen a 425% increase in quote requests from the website which has been pretty remarkable – but I’d always like to see more!</p>
                    <h6 class="fs-0 mb-1 mt-4">Michael Clarke</h6>
                    <p class="mb-0 text-500">CEO, A.E.T Institute</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="row px-lg-8">
                  <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="{{ asset('frontend/assets/img/client2.png') }}" alt="Member" draggable="false"/></div>
                  <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                    <p class="lead">Writing case studies was a daunting task for us. We didn’t know where to begin or what questions to ask, and clients never seemed to follow through when we asked. Elixir team did everything – with almost no time or effort for me!</p>
                    <h6 class="fs-0 mb-1 mt-4">Maria Sharapova</h6>
                    <p class="mb-0 text-500">Managing Director, Themewagon Inc.</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="row px-lg-8">
                  <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="{{ asset('frontend/assets/img/client3.png') }}" alt="Member" draggable="false"/></div>
                  <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                    <p class="lead">As a sales gamification company, we were skeptical to work with a consultant to optimize our sales emails, but Elixir was highly recommended by many other Y-Combinator startups we knew. Elixir helped us run a ~6 week email campaign.</p>
                    <h6 class="fs-0 mb-1 mt-4">David Beckham</h6>
                    <p class="mb-0 text-500">Chairman, Harmony Corporation</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-nav">
              <div class="swiper-button-prev icon-item icon-item-lg"><span class="fas fa-chevron-left fs--2"></span></div>
              <div class="swiper-button-next icon-item icon-item-lg"><span class="fas fa-chevron-right fs--2"></span></div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->


     
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

@endsection