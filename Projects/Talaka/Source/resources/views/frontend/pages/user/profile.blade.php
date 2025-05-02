@extends('frontend.main.index')
@section('profile')


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <span id="Question" class="d-none"></span>
        <select id="Accent" class="d-none"></select>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-100">
        <div class="container">
          <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">Since</a>, &nbsp;<a class="d-inline-block text-500">{{ \Carbon\Carbon::parse(session('Seo')->created_at)->format("F j, Y") }}</a></div>
          </div>
          <div class="row">
           


            <div class="col-lg-8">


              <div class="card">
               

                <div class="card-body p-5">
                  <div class="pb-5">
                    <h4>{{session('Seo')->meta_title}} Personal Account</h4>

                    <form class="mt-4"method="POST" action="{{ route('logout') }}" role="form">
                    @csrf
                      <div class="row">

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" placeholder="Your Email" aria-label="Your Email" value="Email: {{session('User')->email}}" /></div>

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" placeholder="Your Phone" aria-label="Your Phone" value="Phone: {{session('User')->phone}}" /></div>

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" placeholder="Your Level" aria-label="Your Level" value="Level: {{session('User')->level}}" /></div>

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" placeholder="Your Validation" aria-label="Your Validation" value="Expired at: {{ \Carbon\Carbon::parse(session('User')->verify)->format("F j, Y") }}" /></div>

        <div class="col-6 mt-4">
            <input readonly class="form-control bg-white" type="text" placeholder="Your Gender" aria-label="Your Gender" value="My Gender: {{ strtoupper(session('User')->gender) }}" />
        </div>


        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" placeholder="Your Required" aria-label="Your Required" value="Calling Required: {{ strtoupper(session('User')->require) }}" /></div>


                      </div>




<div class="card">
  
<section style="margin-top: 15px; padding-top:5px; padding-bottom:5px;" class="section-quiz">
  <!--for demo wrap-->
  <h1>Quiz</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Que No.</th>
          <th>Que</th>
          <th>ANS</th>
          <th>My ANS</th>
          <th>Accent</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">


<table cellpadding="0" cellspacing="0" border="0">
    <tbody>
        @if(count($quizs) > 0)
            <!-- Your table rows with data -->
            @foreach($quizs as $quiz)
                @php
                    $que = \App\Models\Questions::find($quiz->question);
                    $ansColumnName = 'ans_' . $que->answer;
                @endphp
                <tr>
                    <td>{{ $quiz->question }}</td>
                    <td>{{ $que->question }}</td>
                    <td>{{ $que->$ansColumnName }}</td>
                    <td>{{ $quiz->answer }}</td>
                    <td>{{ $quiz->accent_rate }}/10</td>
                    <td style="font-weight: bold; cursor: pointer;color: darkgreen;" data-question="{{ $que->$ansColumnName }}" class="Listening">Listen</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td style="text-align: center;" colspan="6">No data</td>
            </tr>
        @endif
    </tbody>
</table>
  </div>

                <div class="col-12 mt-4 text-center">
    <div class="d-flex justify-content-center">
        <button class="btn-danger btn" type="submit" name="submit">
            <span class="fw-semi-bold">Logout</span>
        </button>
    </div>
</div>

                    </form>
                  </div>
                </div>

              </div>




</section>
 </div>






            </div>


            <div class="col-lg-4 text-center ms-auto mt-5 mt-lg-0">
              <div class="px-2">
                <div class="card mb-5">
                  <div class="card-body p-5">
                    <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <img class="rounded-circle" data-zanim-xs='{"delay":0}' src="{{ asset('frontend/upload/users_images/' . session('User')->image) }}" alt="Author" draggable="false"/>
                    </div>
                      <h5 class="text-capitalize mt-3 mb-0" data-zanim-xs='{"delay":0.1}'>{{session('User')->firstname}} {{session('User')->lastname}}</h5>
                      <p class="mb-0 mt-3" data-zanim-xs='{"delay":0.2}'>{{session('User')->short_description}}</p>
                      
                      <div class="pt-4" data-zanim-xs='{"delay":0.3}'>


                    @if(!empty(session('User')->fb_link))
                        <a class="d-inline-block" type="button" onclick="window.open('{{ session('User')->fb_link }}', '_blank')">
                            <span class="fab fa-facebook-square fs-2 mx-2 text-400"></span>
                        </a>
                    @endif

                    </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


@include('frontend.pages.user.style')

@include('frontend.pages.user.listen')

@endsection