@extends('frontend.main.index')
@section('video')


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
            <div data-zanim-xs='{"delay":0}'><a class="d-inline-block text-500">Page</a>, &nbsp;<a class="d-inline-block text-500">Video Call Request</a></div>
          </div>
          <div class="row">
           


            <div class="col-lg-12">


              <div class="card">
               

                <div class="card-body">
                    <h4>Informations</h4>
                    <p>We Give you Daily Video Chat With Talaka Community To enhance your English accent.</p>

<ul>
    <li>Create A Call: How many Calls are Left for today.</li>
    <li>Receive A Call: How many Online Calls are Left for today.</li>
    <li>Gender: Select Specific Gender Action in the call.</li>
    <li>Rates: You must Rate The user in the call.</li>
</ul>


        <div class="row">

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" value="Create A Call (Left) : {{$limitations->call - count($call_recorder)}} Times." /></div>

        <div class="col-6 mt-4"><input readonly class="form-control bg-white" type="text" value="Create A Online (Left) : {{$limitations->receive - count($receive_recorder)}} Times." /></div>



 <div class="col-12 mt-4">

<select class="form-control" name="gender" id="gendor"></select>

</div>



   




            </div>



            </div>
          </div>
        </div><!-- end of .container-->

    <div class="col-12 mt-4 text-center">

<div class="d-flex justify-content-center">
@php
    $routeNames = [
        'createCall' => route('create.call', ['UID' => Auth()->user()->identifier, 'Gender' => ':gender']),
        'createReceive' => route('create.receive', ['UID' => Auth()->user()->identifier, 'Gender' => ':gender'])
    ];
@endphp

@if($not_completed)


    <button class="btn btn-danger" type="button" onclick="window.location.href='/video-room/{{$not_completed->from}}/{{$user->identifier}}'">
        <span class="fw-semi-bold">Complete Last Video Chat: Rate</span>
    </button>


   




@else


    @php
        if ($limitations->receive - count($receive_recorder) > 0) {
    @endphp
@if($call_acess)
    <form class="mt-4 receive" method="POST" action="#" role="form">
        @csrf
        <button class="btn-warning btn" type="submit" name="submit">
            <span class="fw-semi-bold">Request a Online</span>
        </button>
    </form>
@endif

    @php
        } elseif ($limitations->call - count($call_recorder) > 0) {
    @endphp

    @if($receive_acess)
            <form class="mt-4 call" method="POST" action="#" role="form">
              @csrf
            <button class="btn-success btn" type="submit" name="submit">
                <span class="fw-semi-bold">Request a Call</span>
            </button>
            </form>
    @endif
    @php
        }
    @endphp

@endif
</div>



</div>
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

<script type="text/javascript">
var routeNames = @json($routeNames);
var gender;
var gendor = document.getElementById("gendor");
var gendors = {
  1: ["Gender : Male", 512],
  2: ["Gender : Female", 512],
  3: ["Gender : Both", 512],
};

for (var p in gendors){
  var option = document.createElement("option");
  option.textContent = gendors[p][0];
  option.value = p;
  gendor.appendChild(option);
}

<?php


switch(Auth()->user()->require) {
    case 'male':
        echo 'gendor.selectedIndex = 0;';
        echo 'gender = "male";';
        echo 'updateFormAction();';
        break;
    case 'female':
        echo 'gendor.selectedIndex = 1;';
        echo 'gender = "female";';
        echo 'updateFormAction();';
        break;
    case 'both':
        echo 'gendor.selectedIndex = 2;';
        echo 'gender = "both";';
        echo 'updateFormAction();';
        break;
    default:
        // Default case
        echo 'gendor.selectedIndex = 0;';
        echo 'gender = "male";';
        echo 'updateFormAction();';
}
?>

        var genderSelect = document.getElementById("gendor");

        // Add event listener for changes in the selected value
        genderSelect.addEventListener("change", function() {
            // Get the selected value
            var selectedGender = genderSelect.value;
            
            // Log the selected value (You can replace this with your desired functionality)
            // console.log("Selected Gender:", selectedGender);
            if(selectedGender == 1){
                gender = 'male';
            }
            
            if(selectedGender == 2){
                gender = 'female';
            }

            if(selectedGender == 3){
                gender = 'both';
            }

        });


function updateFormAction() {
    var actionText = document.querySelector('.fw-semi-bold').textContent;

    var form;
    var routeName;

    if (actionText === 'Request a Call') {
        form = document.querySelector('.call');
        routeName = 'createCall';
    } else if (actionText === 'Request a Online') {
        form = document.querySelector('.receive');
        routeName = 'createReceive';
    }

    if (form && routeNames[routeName]) {
        var action = routeNames[routeName].replace(':gender', gender);
        form.action = action;
    }
}


</script>


@endsection