<meta name="csrf-token" charset="utf-8" content="{{ csrf_token() }}">

<script src="{{ asset('frontend/extra/js/jquery.js') }}"></script>



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
                                <a class="nav-link" href="/">Home</a>
                            </li>

                            <li class="nav-item {{ request()->is('shop') ? 'active' : ''}}">
                                <a class="nav-link" href="/shop/?page=1">shop</a>
                            </li>

                            <!-- If loged in -->
                            @auth



<li class="nav-item submenu dropdown {{ request()->is('contact') ? 'active' : '' }}">

<a style="cursor: pointer;" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                 aria-expanded="false" ><i style="font-size: auto;" class="fa fa-user-circle"></i></a>


<ul class="dropdown-menu">
<li class="nav-item"><a class="nav-link" href="/user/profile">Profile</a></li>

<li class="nav-item">
    <a class="nav-link" href="/wishlist">Wishlist
                                        <span class="" ss="counter">
                                        <span style="background-color: black;" class="circle">
                                            <span id='wishlist_counter' style='color:white;' class='number'>
                                                {{ $wishlistCount }}
                                                <!-- 10 -->
                                            </span>
                                        </span>
                                    </span>
</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/compare">
    Compare
                                            <span class="" ss="counter">
                                        <span style="background-color: black;" class="circle">
                                            <span id='compare_counter' style='color:white;' class='number'>
                                                {{ $compareCount }}
                                            </span>
                                        </span>
                                    </span>
</a>

</li>


<li class="nav-item"><a class="nav-link" href="/track">Track</a></li>


<li class="nav-item">
    <form id='logout_form' action="{{ route('logout') }}" method="POST">
        @csrf
        <a class="nav-link" href="#" onclick="document.getElementById('logout_form').submit()">Logout</a>
    </form>
    
</li>


</ul>
               
</li>


                            @else
                            
                            <li class="nav-item {{ request()->is('contact') ? 'active' : ''}}">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>

                            <li class="nav-item {{ request()->is('login','register') ? 'active' : ''}}">
                                <a class="nav-link" href="/login">Login</a>
                            </li>

                            @endauth

                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <li class="nav-item">
                                <a style="cursor:pointer;" class="cart js-show-cart">
                                    <span class="ti-bag"></span>
                                    <span class="counter">
                                        <span class="circle">
                                            <span style='color:white;' class='number-cart number'>
                                                {{ Cart::count() }}
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>


                         <!--    <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>

            <style type="text/css">
                .circle{
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    width: 20px;
                    height: 20px;
                    background-color: #ffba00;
                    border-radius: 50%;
                }

            </style>


<script type="text/javascript">
    

// When Page Loading Dom Successfully
    $(document).ready(function () {


        // Handle Click on Categories, Brands
        $('ul.main-categories > li > a').on('click', function (e) {
            var $arrowIcon = $(this).find('.fa-arrow-down');



            // Checking the arrow by if condition
            if ( !$arrowIcon.hasClass('expanded')){
                // Prevent default Navigation
                e.preventDefault();

                //Toggling The Expand For the arrow {Categories}
                $arrowIcon.toggleClass('fa-arrow-up');

                // Toggle Controll, SubCategories, Using Tenary Condition
                $(this).attr('aria-expanded', function(i, attr){
                    return attr === 'false' ? 'true' : 'false';
                });

                $($(this).attr('href')).collapse('toggle');
            }
        });




// Category

            // Handle Clicking on the Category to load the category infos->url
            // ul.main-categories on  li.main-nav-list > span

            $('ul.main-categories').on('click', 'li.main-nav-list > a', function(e){
                // Prevent default Navigation
                e.preventDefault();

                // Checking if clicked on the element (span), or the arrow (i)

                if($(e.target).is('.category-name')){
                    var url = $(e.target).data('url');
                    window.location = url;
                }
            })




            // Handle Clicking on the SubCategory to load the Subcategories infos

            $('ul.main-categories').on('click', '.category-sub', function(e){
                // Prevent default Navigation
                e.stopPropagation(); // Prevent the Click Events from parent html Tag

                // Checking if clicked on the element (a) to load the link of Subcategory
                // fetching href link to vist it
                var href = $(this).attr('href');
                window.location = href;
    });




// Brands

            // Handle Clicking on the Category to load the category infos->url
            // ul.main-categories on  li.main-nav-list > span

            $('ul.main-categories').on('click', 'li.main-nav-list > a', function(e){
                // Prevent default Navigation
                e.preventDefault();

                // Checking if clicked on the element (span), or the arrow (i)

                if($(e.target).is('.brand-name')){
                    var url = $(e.target).data('url');
                    window.location = url;
                }
            })



            // Handle Clicking on the SubCategory to load the Subcategories infos

            $('ul.main-categories').on('click', '.brand-sub', function(e){
                // Prevent default Navigation
                e.stopPropagation(); // Prevent the Click Events from parent html Tag

                // Checking if clicked on the element (a) to load the link of Subcategory
                // fetching href link to vist it
                var href = $(this).attr('href');
                window.location = href;
    });
     });//Close Main Function {Loaded Document ready..!}       
</script>


     <!-- Toaster -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <!-- Toaster   -->

<script type="text/javascript">

@if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"

    switch(type){

    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
    break;    
    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
    break;    
    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
    break;    
    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");     
    break;
    }
@endif
</script>