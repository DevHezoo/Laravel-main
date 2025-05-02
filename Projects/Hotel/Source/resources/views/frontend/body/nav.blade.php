
@php
$seo = App\Models\Seo::find(1);
@endphp

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> {{ $seo-> meta_email }}</li>
            <li><i class="fa fa-map"></i> {{ $seo-> meta_address }}</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            
          @if(!empty($seo->meta_fb))
    <li><a href="{{ url($seo->meta_fb) }}"><i class="fab fa-facebook"></i></a></li>
@endif

@if(!empty($seo->meta_tw))
    <li><a href="{{ url($seo->meta_tw) }}"><i class="fab fa-twitter"></i></a></li>
@endif

@if(!empty($seo->meta_li))
    <li><a href="{{ url($seo->meta_li) }}"><i class="fab fa-linkedin"></i></a></li>
@endif

@if(!empty($seo->meta_in))
    <li><a href="{{ url($seo->meta_in) }}"><i class="fab fa-instagram"></i></a></li>
@endif

          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>{{ $seo-> meta_title }}</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                      <li><a class="{{ request()->is('properties') ? 'active' : '' }}" href="/properties">Properties</a></li>

                      @auth
                      <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="/contact">Ticket</a></li>
                      @else
                      <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact Us</a></li>
                      @endauth
                      

                      <!-- <li><a href="/logout">Logout</a></li> -->

 


@auth
    @if(request()->is('profile'))
                <form id='logout_form' action="{{ route('logout') }}" method="POST">
            @csrf
            <li><a href="#" onclick="document.getElementById('logout_form').submit()">Logout</a></li>
            <li hidden></li>
        </form>
    @else
        <form id='logout_form' action="{{ route('logout') }}" method="POST">
            @csrf
            <li><a href="#" onclick="document.getElementById('logout_form').submit()">Logout</a></li>
            <li hidden></li>
        </form>

        <li>
            <a style="{{ request()->is('profile') ? 'color: #f35525;' : '' }}"
               href="/profile">
                <i class="fa fa-calendar" style="color: white;"></i> 
                Profile
            </a>
        </li>
    @endif
@else
    <li>
        <a style="{{ request()->is('login', 'register') ? 'color: #f35525;' : '' }}"
           href="{{ request()->is('login') ? '/register' : (request()->is('register') ? '/login' : '/login') }}">
            <i class="fa fa-calendar" style="color: white;"></i> 
            {{ request()->is('login') ? 'Register' : (request()->is('register') ? 'Login' : 'Login') }}
        </a>
    </li>
@endauth




                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->





