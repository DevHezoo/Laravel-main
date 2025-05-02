@php
$seo = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.body.header')
<title>{{ $seo-> meta_title }} > Signal</title>
@include('frontend.body.icon')
@include('frontend.body.init')

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

@include('frontend.body.extra.header')


    <main id="main">





      <div class="hero-section inner-page">
        <div class="wave">

          <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path
                  d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                  id="Path"></path>
              </g>
            </g>
          </svg>

        </div>


        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay="">{{ $translations['Signal'] }}</h1>
                  <!-- <p class="mb-5" data-aos="fade-up"data-aos-delay="100"></p>   -->
                </div>
              </div>
            </div>
          </div>
        </div>

</div>










      <section class="site-section">
      <div class="container">


          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-12" data-aos="fade-up">



<div class="progress-table-wrap">
                    <div class="progress-table" style="max-height: 275px">
                        <div class="table-head">

<div style="font-size: 7px" class="Total">{{ $translations['Name'] }}</div>
<div style="font-size: 7px" class="Status">{{ $translations['Status'] }}</div>
<div style="font-size: 7px" class="Date">{{ $translations['Date'] }}</div>

<div style="font-size: 7px" class="Action">{{ $translations['Open_Price'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Take_Profit_1'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Take_Profit_2'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Take_Profit_3'] }}</div>

<div style="font-size: 7px" class="Action">{{ $translations['Stop_Loss'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Profit_Loss'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Trade_Result'] }}</div>

<div style="font-size: 7px" class="Action">{{ $translations['Trade_Probability'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Time_Frame'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Last_Update_Time'] }}</div>
<div style="font-size: 7px" class="Action">{{ $translations['Comment'] }}</div>
</div>


<div class="table-row">
<div style="font-size: 7px" class="Total">{{$Signal->name}}</div>

<div style="font-size: 7px" class="Action">
<a style="color:green;font-weight: bold;">{{$Signal->status}}</a>
</div>

<div style="font-size: 7px" class="Date">{{$Signal->date}}</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->open_price}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->take_profit_1}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->take_profit_2}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->take_profit_3}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->stop_loss}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->profit_loss}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->trade_result}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->trade_probability}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->time_frame}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->last_update_time}}</a>
</div>

<div style="font-size: 7px" class="Action">
<a style="color:gray;font-weight: bold;">{{$Signal->comment}}</a>
</div>

</div>

 </div>
</div>



            </div>
          </div>




        <div class="row">
          <div class="col-md-8 blog-content">


            <div class="row mb-5">


    <div class="row">
        @if(!empty($Signal->img_1) && !empty($Signal->img_2))
                <div class="col-md-{{ 12 / 2 }}">
                    <figure>
                        <img src="{{ asset($Signal->img_1) }}" alt="{{ $Signal->name }}" class="img-fluid">
                    </figure>
                </div>
                <div class="col-md-{{ 12 / 2 }}">
                    <figure>
                        <img src="{{ asset($Signal->img_2) }}" alt="{{ $Signal->name }}" class="img-fluid">
                    </figure>
                </div>
        @elseif(!empty($Signal->img_1))
                <div class="col-md-{{ 12 / 1 }}">
                    <figure>
                        <img src="{{ asset($Signal->img_1) }}" alt="{{ $Signal->name }}" class="img-fluid">
                    </figure>
                </div>
        @elseif(!empty($Signal->img_2))
                <div class="col-md-{{ 12 / 1 }}">
                    <figure>
                        <img src="{{ asset($Signal->img_2) }}" alt="{{ $Signal->name }}" class="img-fluid">
                    </figure>
                </div>
        @endif
    </div>



            </div>
            

            <blockquote><p>{{ $Signal->comment }}.</p></blockquote>

            <p>{{ $Signal->long_desc }}.</p>

            <div class="pt-5">
              <h3 class="mb-5">{{count($Comments)}} {{ $translations['Comments'] }}</h3>
              <ul class="comment-list">


@foreach($Comments as $Comment)

@php
$user = App\Models\User::where('id', $Comment->user_id)->first();
@endphp
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{ asset($user->photo) }}" alt="{{$user->name}}">
                  </div>
                  <div class="comment-body">
                    <h3>{{$user->name}}</h3>
                    <div class="meta">{{$Comment->created_at}}</div>
                    <p>{{$Comment->comment}}</p>
                    <!-- <p><a href="#" class="reply">Like</a></p> -->
                  </div>
                </li>

@endforeach


              </ul>
              <!-- END comment-list -->
              
              @auth
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">{{ $translations['Leave_a_comment'] }}</h3>
                <form method="post" action="{{ route('comment.signal', ['ID' => $Signal->id]) }}" class="">
                @csrf
                
                    <div class="col-md-12 form-group">
                      <label for="comment">{{ $translations['Message'] }}</label>
                      <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                      <div class="validate"></div>
                    </div>

                  <div class="form-group">
                    <input style="display:none" type="submit" value="{{ $translations['Post_Comment'] }}" class="btn btn-primary">
                  </div>

                </form>
              </div>
              @endauth

            </div>

          </div>
          <div class="col-md-4 sidebar">

            <div class="sidebar-box">
              <img src="{{ asset($User->photo) }}" alt="{{ asset($User->name) }}" class="img-fluid mb-4">
              <h3>{{ $translations['About_The_Author'] }}</h3>
              <p>{{ $User->expert_short_info }}.</p>
            </div>

<!--             <div class="sidebar-box">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div> -->
          </div>
        </div>
      </div>
    </section>



  @include('frontend.body.footer')

  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.body.extra.rest')

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    const commentTextarea = document.getElementById("comment");
    const submitButton = document.querySelector('input[type="submit"]');

    commentTextarea.addEventListener("input", function() {
        const commentValue = this.value.trim(); // Get the trimmed value of textarea
        if (commentValue.length > 0) {
            submitButton.style.display = "block"; // Show the submit button if textarea is not empty
        } else {
            submitButton.style.display = "none"; // Hide the submit button if textarea is empty
        }
    });
});
</script>
</body>

</html>
