@extends('frontend.main.index')
@section('quiz')


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" >


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-100">
        <br><br><br>
        <div class="container">
          <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">Quiz Page</a></div>
          </div>
          <div class="row">
           


            <div class="col-lg-12">


      
                  <div class="pb-5 text-center">
                    <h4 style="text-decoration: underline;">Start Quiz Application</h4>
                  </div>
           



      
                <div class="card-body p-5">
                  <div class="pb-5 text-center">
                    @include('quiz.quiz')
                  </div>
                </div>
          

            </div>


  
          

            </div>
          </div>
        </div><!-- end of .container-->
        <br><br><br>
      </section><!-- <section> close ============================-->
      <!-- ============================================-->

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



@endsection