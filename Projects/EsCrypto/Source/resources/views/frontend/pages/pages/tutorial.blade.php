@extends('frontend.main.index')
@section('tutorial')


        <div class="card mb-3">

            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Tutorial</h3>
                    <ul class="bullet-inside ps-0">
<p class="fs--1 mb-0">
    <li style="font-size: 0.8rem;">Earn More!</li>
    <li style="font-size: 0.8rem;">Share a simple video about {{ session('Seo')->meta_title }}</li>
    <li style="font-size: 0.8rem;">Get More (Viewers, Likes) = more prizes we will give you as well</li>
    <li style="font-size: 0.8rem;">Click Contact & send us the video</li>
</p>
</ul>
  <hr class="my-1" />
<ul class="bullet-inside ps-0">
<p class="fs--1 mb-0">
    <li style="font-size: 0.8rem;">Ready to share with us your video!</li>
    <li style="font-size: 0.8rem;">Provide your referral link in the video description</li>
    <li style="font-size: 0.8rem;">which is associated with the same account you joined us with</li>
    <li style="font-size: 0.8rem;">You can use any language to explain our website</li>
</p>
</ul>


                </div>
      </div>
            </div>
        </div>

          <div class="card mb-3">
                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe data-aa='2306704' src='//ad.a-ads.com/2306704?size=728x90' style='width:728px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;'></iframe>
            </div>
          </div>


          <div class="card mb-3">
                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<iframe src='//ads.coinserom.com/publisher?adsunit=323737&serom=3135313931&size=728x90' style='width:728px;height:90px;border:0px;padding:0;background-color: transparent;overflow: auto;'>
</iframe>
            </div>
          </div>


          <div class="card mb-3">
            <div class="card-body">

<h6><a href="#" style="cursor: default;">Welcome to {{session('Seo')->meta_title}}<span class="fas fa-caret-right ms-2"></span></a></h6>
<p class="fs--1 mb-0">We would like to show you how to use our {{session('Seo')->meta_title}} with a fast video tutorial.</p>


<hr class="my-3" />


<div class="player rounded-3" data-plyr-provider="youtube" data-plyr-embed-id="coJ4qyPE18w"> </div>

<!-- <div class="ratio ratio-16x9">
    <iframe src="https://drive.google.com/file/d/1v0biWqV5OQm8_PiBA0q3NqrpaTb6HIw4/preview" frameborder="0" width="100%" height="100%" allowfullscreen style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;"></iframe>
</div> -->
  
</div>


<!-- Add this div at the end of your HTML body or in your template -->
<div id="customAlert" class="custom-alert d-none text-center d-flex align-items-center justify-content-center"></div>

<div class="card-footer d-flex align-items-center bg-light answer">
    <h5 class="d-inline-block me-3 mb-0 fs--1">Was this information helpful?</h5>
    <button class="btn btn-falcon-default btn-sm" onclick="showNotification(true)">Yes</button>
    <button class="btn btn-falcon-default btn-sm ms-2" onclick="showNotification(false)">No</button>
</div>
</div>


                    <div class="card mb-3">

                        <div class="bg-holder d-none bg-card" style="background-image:url({{ asset('frontend/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body text-center">

<script type="text/javascript">
    atOptions = {
        'key' : '4c407329270ac3120da649058b5b33cf',
        'format' : 'iframe',
        'height' : 60,
        'width' : 468,
        'params' : {}
    };
    document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/4c407329270ac3120da649058b5b33cf/invoke.js"></scr' + 'ipt>');
</script>

            </div>
          </div>
          

 <div class="card mb-3">

            <div class="card-header border-bottom">
              <div class="row flex-between-end">

                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Promo Videos : Latest <code>20</code></h5>

                </div>
                

              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel">
                  <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Prize</th>
                          <th scope="col">Status</th>
                          <th class="text-end" scope="col">The Video</th>
                        </tr>
                      </thead>
                      <tbody>

@foreach($videos as $key => $video)
    <tr class="align-middle">
        <td class="text-nowrap">{{$key + 1}}</td>
        <td class="text-nowrap">
            <div class="ms-2">
                {{ $video->name }}
            </div>
        </td>
        @if($video->name == "Admin")
            <td>
                <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">0$</span>
            </td>
        @else
            <td>
                <span class="badge badge rounded-pill d-block p-2 badge-soft-success">{{ $video->prize }}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
            </td>
        @endif

        @if($video->status == "FALSE")
            <td>
                <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">WAITING</span>
            </td>
        @else
            <td>
                <span class="badge badge rounded-pill d-block p-2 badge-soft-success">PAID<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
            </td>
        @endif


        <td class="text-end">
           <button class="btn btn-falcon-default" data-link="{{ $video->link }}" onclick="visit(this)">Watch</button>
        </td>
    </tr>
@endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          




<!-- Add this script at the end of your HTML body or in your JavaScript file -->
<script>

    function visit(button) 
    {
    var Link = $(button).data('link');
    window.open(Link, '_blank');
    }

    function showNotification(isYes) {
        // Hide the "answer" div
        document.querySelector('.answer').classList.add('d-none');

        // Show a custom-styled alert
        const alertDiv = document.getElementById('customAlert');
        alertDiv.className = isYes ? 'custom-alert alert-success' : 'custom-alert alert-danger';
        alertDiv.innerHTML = isYes ? 'Thanks for your feedback! We appreciate it.' : 'We appreciate your feedback. We will improve.';
        alertDiv.classList.remove('d-none');
    }
</script>


@endsection