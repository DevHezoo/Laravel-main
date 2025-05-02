            <nav style="border-radius: 15px;" class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html">
                       <img height="50" width="135" src="{{ asset('frontend/upload/website/'.$seo->meta_icon_2) }}" alt=""></a>
                        <!-- <img src="{{ asset('frontend/main_assets/img/logo.png') }}" alt=""></a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">

                            <!-- Using Tenary Condition to check if visitor in home page "site-url/" -->
                            <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
                                <a class="nav-link" href="/">Home &nbsp &nbsp</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>