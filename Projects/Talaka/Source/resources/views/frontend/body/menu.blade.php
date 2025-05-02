@php
    $currentDateTime = \Carbon\Carbon::now();

    $isSaturdayToThursday = $currentDateTime->isSaturday()
        || $currentDateTime->isSunday()
        || $currentDateTime->isMonday()
        || $currentDateTime->isTuesday()
        || $currentDateTime->isWednesday()
        || $currentDateTime->isThursday();

    $isBusinessHours = $isSaturdayToThursday
        && $currentDateTime->isBetween(
            \Carbon\Carbon::createFromTime(7, 0), 
            \Carbon\Carbon::createFromTime(14, 0)
        );
@endphp

    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
      <div class="container">
        <div class="row align-items-center gx-4">
          <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>{{session('Seo')->meta_address}}.</div>

          
<div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center">
    <span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span>
    @if($isBusinessHours)
        Open: 9:00 AM - 4:00 PM
    @else
        Closed: It's outside business hours
    @endif
</div>


          <div class="col-auto"><span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span><a class="ms-2 fs--1 d-inline text-white fw-bold">{{session('Seo')->meta_phone}}</a></div>
        </div>
      </div>
    </div>
    <div class="sticky-top navbar-elixir">
      <div class="container">
        <nav class="navbar navbar-expand-lg"> <a class="navbar-brand"><img src="{{ asset('frontend/assets/img/logo-dark.png') }}" alt="logo" draggable="false"/></a><button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
          <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">

            @if(!request()->is('/'))
            <li class="nav-item dropdown"><a class="nav-link" type="button" onclick="window.location.href='/'" role="button">Home</a></li>
            @endif

            </ul>

            @if(auth()->check())

            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" type="button" onclick="window.location.href='JavaScript:void(0)'" role="button" data-bs-toggle="dropdown" aria-expanded="false">Training&nbsp;</a>
                <ul class="dropdown-menu">

                  @if(!request()->is('video-room'))
                  <li><a class="dropdown-item" type="button" onclick="window.location.href='/video-room'">Video Room</a></li>
                  @endif

                  @if(!request()->is('quiz'))
                  <li><a class="dropdown-item" type="button" onclick="window.location.href='/quiz'">Quiz</a></li>
                  @endif

                  
                  @if(!Illuminate\Support\Str::contains(request()->path(), 'articles'))
                  <li><a class="dropdown-item" type="button" onclick="window.location.href='/articles'">Articles</a></li>
                  @endif

                </ul>
            </li>
        </ul>

            @else

                @if(!Illuminate\Support\Str::contains(request()->path(), 'articles'))

            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" type="button" onclick="window.location.href='JavaScript:void(0)'" role="button" data-bs-toggle="dropdown" aria-expanded="false">Training&nbsp;</a>
                <ul class="dropdown-menu">
                  
                  <li><a class="dropdown-item" type="button" onclick="window.location.href='/articles'">Articles</a></li>

                </ul>
            </li>
        </ul>
                @endif
            @endif






        <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            @if(!request()->is('contact'))
            @auth
                <li class="nav-item dropdown"><a class="nav-link" type="button" onclick="window.location.href='/contact'" role="button">Ticket</a></li>
            @else
                <li class="nav-item dropdown"><a class="nav-link" type="button" onclick="window.location.href='/contact'" role="button">Contact</a></li>
            @endauth
            @endif
        </ul>

        <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            
            @if(!request()->is('live'))
                <li class="nav-item dropdown"><a class="nav-link" type="button" onclick="window.location.href='/live'" role="button">Live</a></li>
            @endif

            
        </ul>

            @auth
            @if(!request()->is('profile'))
            <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" type="button" onclick="window.location.href='/profile'">Profile</a>
            @endif
            @else
            <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="/sign-in">Membership</a>
            @endauth

          </div>
        </nav>
      </div>
    </div>

