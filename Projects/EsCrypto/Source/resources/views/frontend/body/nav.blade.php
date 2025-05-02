
@auth
@php
$payments = \App\Models\Payment::where('email', auth()->user()->email)
                      ->orderBy('created_at', 'desc')
                      ->take(5)
                      ->get();
@endphp
@endauth
          <nav style="user-select: none;" class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="/">
              <div class="d-flex align-items-center"><img class="me-2" src="{{ asset('frontend/assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" /><span class="font-sans-serif">{{session('Seo')->meta_title}}</span>
              </div>
            </a>






            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">


              <li class="nav-item"> 
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>

@auth



              <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Top Activity</h6>
                        </div>
           
                      </div>
                    </div>


                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">


@if (count(\App\Models\Payment::where('email', auth()->user()->email)->get()) > 0)


  <div class="list-group-title border-bottom">NEW</div>
                        


      @foreach($payments as $payment)


            <div class="list-group-item">
                    <a class="notification notification-flush notification-unread">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <div class="avatar-name rounded-circle"><span>{{ Illuminate\Support\Str::limit($payment->email, 2, '') }}</span></div>
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Earned</strong> {{$payment->amount}} {{$payment->type}} From <strong>{{$payment->from}}</strong>.</p>
                              <span class="notification-time">

@if($payment->from == 'Faucet')
    🎁
@elseif($payment->from == 'Shortlink')
    🏆
@endif

                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->diffForHumans() }}</span>

                            </div>
                          </a>

            </div>

      @endforeach

@endif




                        <div class="list-group-title border-bottom">EARLIER</div>
                        <div class="list-group-item">
                          <a class="notification notification-flush">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="{{ asset('frontend/assets/img/icons/spot-illustrations/falcon.png') }}" alt="" />

                              </div>
                            </div>

<div class="notification-body">
    @auth
      <p class="mb-1">Joined {{session('Seo')->meta_title}}.</p>
      <span class="notification-time">
        <span class="me-2" role="img" aria-label="Emoji">✔️</span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->diffForHumans() }}
      </span>
    @endauth
</div>

                          </a>
                        </div>

                      </div>
                    </div>
                    <div style="cursor: default;" class="card-footer text-center border-top"><a class="card-link d-block" >Notifications</a></div>
                  </div>
                </div>
              </li>

<!--  -->

              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('frontend/assets/img/user.png') }}" alt="" />

                  </div>
                </a>

                  <form hidden id='logout_form' action="{{ route('logout') }}" method="POST">
                @csrf
                  </form> 

                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">

                    <a class="dropdown-item" type="button" onclick="window.location.href='/profile'">Profile &amp; account</a>
                    <a class="dropdown-item" target="_blank" type="button" onclick="window.open('https://t.me/+wfG_kJ2E-dg3Njg0', '_blank');">Our Channel</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" style="cursor:pointer;" onclick="event.preventDefault(); document.getElementById('logout_form').submit()">Logout</a>

                  </div>
                </div>
              </li>

@endauth



            </ul>
          </nav>