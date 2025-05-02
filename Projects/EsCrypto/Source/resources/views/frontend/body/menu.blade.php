
<!-- navbar-inverted -->
        <nav style="user-select: none;" class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>

          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="/">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ asset('frontend/assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" /><span class="font-sans-serif">EsCrypto</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">


              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">


<li class="nav-item">
        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Main
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" type="button" onclick="window.location.href='/'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-home"></span>
            </span>
            <span class="nav-link-text ps-1">{{ auth()->check() ? 'Dashboard' : 'Home' }}</span>
        </div>
    </a>
</li>



<li class="nav-item">
                      <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Language
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

    <a class="nav-link dropdown-indicator" type="button" onclick="window.location.href='javascript:void(0)'" role="button" onclick="event.preventDefault()" data-bs-toggle="collapse" data-bs-target="#language" aria-expanded="false" aria-controls="language">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-language"></span>
            </span>
            <span class="nav-link-text ps-1">{{ strtoupper(isset($_COOKIE['Language']) ? $_COOKIE['Language'] : 'EN') }}</span>

        </div>
    </a>

    <ul class="nav collapse false" id="language">

        <li class="nav-item">
        <a class="nav-link active" type="button" onclick="changeLanguage('en')"  aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">English</span></div></a></li>

        </ul></li>



@auth

                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Earn
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>



<li class="nav-item">
    <a id="faucets" class="nav-link {{ request()->is('faucets') || request()->is('faucet/*') ? 'active' : '' }}" type="button" onclick="window.location.href='/faucets'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-fire"></span>
            </span>
            <span class="nav-link-text ps-1">Faucets</span>
        </div>
    </a>
</li>


<!-- Parent link -->
<li class="nav-item">
    <a class="nav-link {{ request()->is('shortlink*') ? 'active' : '' }} dropdown-indicator" type="button" onclick="window.location.href='javascript:void(0)'" role="button" onclick="event.preventDefault()" data-bs-toggle="collapse" data-bs-target="#shortlinks" aria-expanded="false" aria-controls="shortlinks">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-globe"></span>
            </span>
            <span class="nav-link-text ps-1">Shortlinks</span>
        </div>
    </a>

    <ul class="nav collapse false" id="shortlinks">

        <div id="shortlink">
        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/btc*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/btc'"  aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">BTC</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/ltc*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/ltc'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">LTC</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/doge*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/doge'" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">DOGE</span></div>
            </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/trx*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/trx'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">TRX</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/bnb*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/bnb'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">BNB</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/bch*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/bch'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">BCH</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/dash*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/dash'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">DASH</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/dgb*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/dgb'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">DGB</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/eth*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/eth'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">ETH</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/fey*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/fey'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">FEY</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/sol*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/sol'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SOL</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/usdt*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/usdt'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">USDT</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('shortlink/zec*') ? 'active' : '' }}" type="button" onclick="window.location.href='/shortlink/zec'" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">ZEC</span></div></a></li>
        </div>
        </ul></li>


<!-- Parent link -->
<li class="nav-item">
    <a class="nav-link dropdown-indicator" type="button" onclick="window.location.href='javascript:void(0)'" role="button" onclick="event.preventDefault()" data-bs-toggle="collapse" data-bs-target="#ptc" aria-expanded="false" aria-controls="ptc">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-desktop"></span>
            </span>
            <span class="nav-link-text ps-1">Surf (Soon)</span>
        </div>
    </a>

    <ul class="nav collapse false" id="ptc">

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Articles</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Links</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Youtube</span></div></a></li>

        </ul></li>


        <li class="nav-item">
            <a class="nav-link" type="button">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon">
                        <span class="fas fa-trophy"></span>
                    </span>
                    <span class="nav-link-text ps-1">Achievements (Soon)</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" type="button">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon">
                        <span class="fas fa-fire-alt"></span>
                    </span>
                    <span class="nav-link-text ps-1">Auto Faucets (Soon)</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" type="button">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon">
                        <span class="far fa-calendar-check"></span>
                    </span>
                    <span class="nav-link-text ps-1">Offerwall (Soon)</span>
                </div>
            </a>
        </li>

<!--  --> <!--  --> <!--  -->

                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Investment
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>



<!-- Parent link -->
<li class="nav-item">
    <a class="nav-link dropdown-indicator" type="button" onclick="window.location.href='javascript:void(0)'" role="button" onclick="event.preventDefault()" data-bs-toggle="collapse" data-bs-target="#Investment" aria-expanded="false" aria-controls="Investment">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-money-check-alt"></span>
            </span>
            <span class="nav-link-text ps-1">Invest Type (Soon)</span>
        </div>
    </a>

    <ul class="nav collapse false" id="Investment">

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Islamic Investment</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Mining</span></div></a></li>

        </ul></li>

<!--  --> <!--  --> <!--  -->

                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Advertising Campaign
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

<li class="nav-item">
    <a class="nav-link" type="button">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="far fa-calendar-check"></span>
            </span>
            <span class="nav-link-text ps-1">Offerwall (Soon)</span>
        </div>
    </a>
</li>

<!-- Parent link -->
<li class="nav-item">
    <a class="nav-link dropdown-indicator" type="button" onclick="window.location.href='javascript:void(0)'" role="button" onclick="event.preventDefault()" data-bs-toggle="collapse" data-bs-target="#ptc_campaign" aria-expanded="false" aria-controls="ptc_campaign">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-desktop"></span>
            </span>
            <span class="nav-link-text ps-1">Surf (Soon)</span>
        </div>
    </a>

    <ul class="nav collapse false" id="ptc_campaign">

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Articles</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Links</span></div></a></li>

        <li class="nav-item">
        <a class="nav-link" type="button" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Youtube</span></div></a></li>

        </ul></li>

<script type="text/javascript">
    
    // Add a click event listener to the button

    function openNewTab(url) {
        var newTab = window.open();
        newTab.location.href = url;
    }

    // Add click event listener for 'faucets'
    document.getElementById('faucets').addEventListener('click', function () {
        openNewTab('https://www.profitablegatecpm.com/hun85n5p?key=3b02ac12d70f8e2312ec2f76410f11d1');
    });

    // Add click event listener for 'shortlink'
    document.getElementById('shortlink').addEventListener('click', function () {
        openNewTab('https://www.profitablegatecpm.com/hun85n5p?key=3b02ac12d70f8e2312ec2f76410f11d1');
    });

</script>
@endauth



<li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">About
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

<li class="nav-item">
    <a class="nav-link {{ request()->is('privacy') ? 'active' : '' }}" type="button" onclick="window.location.href='/privacy'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="far fa-check-circle"></span>
            </span>
            <span class="nav-link-text ps-1">Privacy Policy</span>
        </div>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->is('cookie') ? 'active' : '' }}" type="button" onclick="window.location.href='/cookie'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-history"></span>
            </span>
            <span class="nav-link-text ps-1">Cookie Policy</span>
        </div>
    </a>
</li>



<li class="nav-item">
    <a class="nav-link {{ request()->is('log') ? 'active' : '' }}" type="button" onclick="window.location.href='/log'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="far fa-clock"></span>
            </span>
            <span class="nav-link-text ps-1">Changelog</span>
        </div>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" type="button" onclick="window.location.href='/contact'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fa fa-envelope-open"></span>
            </span>
            <span class="nav-link-text ps-1">{{ auth()->check() ? 'Ticket' : 'Contact' }}</span>
        </div>
    </a>
</li>



</li>
<li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Documentation
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

<li class="nav-item">
    <a class="nav-link {{ request()->is('start') ? 'active' : '' }}" type="button" onclick="window.location.href='/start'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-rocket"></span>
            </span>
            <span class="nav-link-text ps-1">Getting started</span>
        </div>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->is('tutorials') ? 'active' : '' }}" type="button" onclick="window.location.href='/tutorials'">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="far fa-file-video"></span>
            </span>
            <span class="nav-link-text ps-1">Tutorials</span>
        </div>
    </a>
</li>

</li>

              </ul>


@auth
            <div class="settings mb-3 {{ request()->is('bonus') ? 'd-none' : '' }}">

                <div class="card alert p-0 shadow-none" role="alert">
                  <div class="btn-close-falcon-container">
                    <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                  </div>
                  <div class="card-body text-center"><img src="{{ asset('frontend/assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="80" />
                    <p class="fs--2 mt-2">Loving what you see? <br />Get your Bonus at
                        <a id="dev-listener" class="alert-heading s2" style="color: rgba(76, 143, 233, 0.5); cursor: pointer;"> {{session('Seo')->meta_title}}</a>
                    </p>

                    <div class="d-grid">
                



                <span class="nav-link-icon">
        <a style="{{ session('Bonus') == 'True' ? 'color:limegreen' : 'color:maron' }}" 
   class="btn btn-falcon-danger d-block" 
   type="button" 
   onclick="window.location.href='/bonus'">
   <span class="fas fa-gift"></span>
   Bonus ({{ session('Bonus') == 'True' ? '✓' : '✘' }})
</a>

                </span>

                      
                    </div>
                  </div>
                </div>
              </div>

          <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div class="toast align-items-center text-white bg-dark border-0 light" id="url-copied-toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body"></div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
          </div>





@endauth

            </div>
          </div>
        </nav>
