


@php
$seo = App\Models\Seo::find(1);
@endphp

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-2">
            <h1 class="mb-0 site-logo"><a href="/" class="mb-0">{{ $seo-> meta_title }}</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-lg-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link">{{ $translations['Home'] }}</a></li>
                <li class="{{ request()->is('live') ? 'active' : '' }}" ><a href="/live" class="nav-link">{{ $translations['Live'] }}</a></li>


                <li class="has-children">
  <a class="nav-link">{{ $translations['More'] }}</a>
  <ul class="dropdown">

                <li><a href="/price" class="nav-link">{{ $translations['Pricing'] }}</a></li>
                <li><a href="/news" class="nav-link">{{ $translations['News'] }}</a></li>

                
                @auth
                <li><a href="/contact" class="nav-link">{{ $translations['Ticket'] }}</a></li>
                <li><a href="/profile" class="nav-link">{{ $translations['Profile'] }}</a></li>
               
  <form hidden id='logout_form' action="{{ route('logout') }}" method="POST">
                @csrf
   </form>              
                @else
                <li><a href="/contact" class="nav-link">{{ $translations['Contact'] }}</a></li>
                @endauth

<li class="has-children">
  <a class="nav-link">{{ $translations['Language'] }}</a>
  <ul  class="dropdown">
    @php
        $language = $_COOKIE['Language'] ?? 'en';
    @endphp

    @if($language === 'en')
  <li>
    <div style="display: inline-flex; align-items: center;">
        <a href="#" class="nav-link" onclick="changeLanguage('ar')" style="display: flex; align-items: center; text-decoration: none;">
            <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/sa.png" width="20" alt="Saudi Arabia" style="margin-right: 5px;"> 
            <span>Arabic</span>
        </a>
    </div>
</li>
    @else
<li>
    <div style="display: inline-flex; align-items: center;">
        <a href="#" class="nav-link" onclick="changeLanguage('en')" style="display: flex; align-items: center; text-decoration: none;">
            <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/us.png" width="20" alt="United States" style="margin-right: 5px;"> 
            <span>English</span>
        </a>
    </div>
</li>

    @endif
  </ul>
</li>

@auth
                <li><a class="nav-link" href="#" onclick="document.getElementById('logout_form').submit()">{{ $translations['Logout'] }}</a></li>
@endauth

  </ul>
</li>

<!--                 <li class="has-children">
                  <a href="blog.html" class="nav-link">Language</a>
                  <ul class="dropdown">
                    <li><a href="blog.html" class="nav-link">English</a></li>
                    <li><a href="blog-single.html" class="nav-link">Arabic</a></li>
                  </ul>
                </li> -->



              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

            <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
              data-target="#main-navbar">
              <span></span>
            </a>
          </div>

        </div>
      </div>

    </header>


<script>
function changeLanguage(locale) {
  // Perform a fetch request to your Laravel route
  fetch(`/change-language/${locale}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ locale: locale })
  })
    .then(response => {
      // Reload the page after language change
      location.reload();
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
</script>