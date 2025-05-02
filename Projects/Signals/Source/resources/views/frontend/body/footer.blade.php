@php
$seo = App\Models\Seo::find(1);
@endphp

    <footer class="footer" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3>{{ $translations['About_Us'] }}</h3>
            <p>{{ $seo-> meta_description }}.</p>
            <p class="social">

@if($seo->meta_fb !== '')
    <a href="{{ $seo->meta_fb }}" target="_blank"><span class="icofont-facebook"></span></a>
@endif

@if($seo->meta_tw !== '')
    <a href="{{ $seo->meta_tw }}" target="_blank"><span class="icofont-twitter"></span></a>
@endif

            </p>
          </div>
          <div class="col-md-7 ml-auto">
            <div class="row site-section pt-0">
              <div class="col-md-4 mb-4 mb-md-0">
                <h3>{{ $translations['Navigation'] }}</h3>
                <ul class="list-unstyled">
                  <li><a href="#">{{ $translations['Pricing'] }}</a></li>
                </ul>
              </div>
              <div class="col-md-4 mb-4 mb-md-0">
                <h3>{{ $translations['Services'] }}</h3>
                <ul class="list-unstyled">
                  <li><a href="#">{{ $translations['Team'] }}</a></li>
                </ul>
              </div>
              <div class="col-md-4 mb-4 mb-md-0">
                <h3>{{ $translations['Downloads'] }}</h3>
                <ul class="list-unstyled">
                  <li><a href="#">{{ $translations['App_Store'] }}</a></li>
                  <li><a href="#">{{ $translations['Play_Store'] }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center text-center">
          <div class="col-md-7">
            <p class="copyright">{{ $translations['CopyRights'] }}</p>
          </div>
        </div>

      </div>
    </footer>
