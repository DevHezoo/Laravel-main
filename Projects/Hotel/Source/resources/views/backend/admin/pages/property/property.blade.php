@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Properties /</span> Property</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Property</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"
                        ><i class="bx bx-bell me-1"></i> </a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"
                        ><i class="bx bx-link-alt me-1"></i> </a
                      >
                    </li>
                  </ul>

                  <div class="card mb-4">
                    <h5 class="card-header">Property Details</h5>



    <form method="post" action="{{ route('update.property.info',$property->id) }}"  enctype="multipart/form-data" >
      @csrf


                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

<!-- Hidden file input for selecting an image -->
<input hidden type="file" name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" style="display: none;" />


<!-- Image preview element -->
<img
  src="{{ (!empty($property->property_thumbnail)) ? asset('frontend/'.$property->property_thumbnail) : asset('frontend/upload/no_image.jpg') }}"
  alt="user-avatar"
  class="d-block rounded"
  height="100"
  width="100"
  id="imagePreview"
/>




                        <div class="button-wrapper">

                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
<label for="imageUpload" tabindex="0">
  <span class="d-none d-sm-block">
    Upload new photo
  </span>
</label>

                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button id='reset' type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>



                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form>
                        <div class="row">
                          
                          <div class="mb-3 col-md-6">
                            <label for="id" class="form-label">ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="id"
                              name="id"
                              value="{{$property->id}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="property_code" class="form-label">Property Code</label>
                            <input
                              class="form-control"
                              type="text"
                              id="property_code"
                              name="property_code"
                              value="{{$property->property_code}}"
                              readonly
                            />
                          </div>


@php
    $selectedPropertyType = \App\Models\PropertyType::where('id', $property->property_type)->first();
@endphp

<div class="mb-3 col-md-6">
    <label for="type" class="form-label">Property Type</label>
    <select id="type" name="type" class="select2 form-select">
        @foreach($type as $key => $item)
            <option value="{{ $item->id }}" {{ $selectedPropertyType && $selectedPropertyType->id == $item->id ? 'selected' : '' }}>
                {{ $item->property_type }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-3 col-md-6">
<label for="property_title" class="form-label">Property Title</label>
                            <input
                              class="form-control"
                              type="text"
                              id="property_title"
                              name="property_title"
                              value="{{$property->property_title}}"
                            />
                          </div>

<div class="mb-3 col-md-6">
<label for="property_name" class="form-label">Property Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="property_name"
                              name="property_name"
                              value="{{$property->property_name}}"
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="property_slug" class="form-label">Property Slug</label>
                            <input
                              class="form-control"
                              type="text"
                              id="property_slug"
                              name="property_slug"
                              value="{{$property->property_slug}}"
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="property_bedroom" class="form-label">Property Bedroom</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_bedroom"
                              name="property_bedroom"
                              value="{{$property->property_bedroom}}"
                            />
                          </div>
 

<div class="mb-3 col-md-6">
<label for="property_bathroom" class="form-label">Property Bathroom</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_bathroom"
                              name="property_bathroom"
                              value="{{$property->property_bathroom}}"
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="property_area" class="form-label">Property Area</label>
                            <input
                              placeholder="0 m2"
                              class="form-control"
                              type="text"
                              id="property_area"
                              name="property_area"
                              value="{{$property->property_area}}"
                            />
                          </div>

<div class="mb-3 col-md-6">
<label for="property_floor" class="form-label">Property Floor</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_floor"
                              name="property_floor"
                              value="{{$property->property_floor}}"
                            />
                          </div>





        <div class="mb-3 col-md-6">
        <label for="property_parking_status" class="form-label">property Parking Status</label>
        <select id="property_parking_status" name="property_parking_status" class="select2 form-select">
            
 
        <option value="{{ $property->property_parking_status }}" {{ $property->property_parking_status === 'yes' ? 'selected' : '' }}>
            yes
        </option>
        
        <option value="no" {{ $property->property_parking_status === 'no' ? 'selected' : '' }}>
            no
        </option>
      </select>
    </div>



<div class="mb-3 col-md-6">
<label for="property_parking_spots" class="form-label">Property Parking Spots</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_parking_spots"
                              name="property_parking_spots"
                              value="{{$property->property_parking_spots}}"
                            />
</div>



<div class="mb-3 col-md-6">
<label for="property_price" class="form-label">property Price</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_price"
                              name="property_price"
                              value="{{$property->property_price}}"
                            />
</div>





        <div class="mb-3 col-md-6">
        <label for="property_status" class="form-label">Property Status</label>
        <select id="property_status" name="property_status" class="select2 form-select">
            
 
        <option value="{{ $property->property_status }}" {{ $property->property_status === 'available' ? 'selected' : '' }}>
            available
        </option>
        
        <option value="{{ $property->property_status }}" {{ $property->property_status === 'unavailable' ? 'selected' : '' }}>
            unavailable
        </option>
      </select>
    </div>




                      <div class="mb-3 col-md-6">
                        <label for="property_short_desc" class="form-label">Property Short Description</label>
                        <textarea class="form-control" name="property_short_desc" id="property_short_desc" rows="2">{{$property->property_short_desc}}</textarea>
                      </div>


                      <div class="mb-3 col-md-6">
                        <label for="property_long_desc" class="form-label">Property Long Description</label>
                        <textarea class="form-control" name="property_long_desc" id="property_long_desc" rows="2">{{$property->property_long_desc}}</textarea>
                      </div>




<div class="mb-3 col-md-6">
<label for="property_collapse1_que" class="form-label">Property Collapse Que1</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse1_que"
                              name="property_collapse1_que"
                              value="{{$property->property_collapse1_que}}"
                            />
</div>


<div class="mb-3 col-md-6">
<label for="property_collapse1_ans" class="form-label">Property Collapse Ans1</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse1_ans"
                              name="property_collapse1_ans"
                              value="{{$property->property_collapse1_ans}}"
                            />
</div>





<div class="mb-3 col-md-6">
<label for="property_collapse2_que" class="form-label">Property Collapse Que2</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse2_que"
                              name="property_collapse2_que"
                              value="{{$property->property_collapse2_que}}"
                            />
</div>


<div class="mb-3 col-md-6">
<label for="property_collapse2_ans" class="form-label">Property Collapse Ans2</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse2_ans"
                              name="property_collapse2_ans"
                              value="{{$property->property_collapse2_ans}}"
                            />
</div>




<div class="mb-3 col-md-6">
<label for="property_collapse3_que" class="form-label">Property Collapse Que3</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse3_que"
                              name="property_collapse3_que"
                              value="{{$property->property_collapse3_que}}"
                            />
</div>


<div class="mb-3 col-md-6">
<label for="property_collapse3_ans" class="form-label">Property Collapse Ans3</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_collapse3_ans"
                              name="property_collapse3_ans"
                              value="{{$property->property_collapse3_ans}}"
                            />
</div>




<div class="mb-3 col-md-6">
<label for="property_payment" class="form-label">Property Payment Symbol Text</label>
                            <input
                              placeholder="stripe"
                              class="form-control"
                              type="text"
                              id="property_payment"
                              name="property_payment"
                              value="{{$property->property_payment}}"
                            />
</div>



<div class="mb-3 col-md-6">
<label for="property_qty" class="form-label">Property Available Quantity</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_qty"
                              name="property_qty"
                              value="{{$property->property_qty}}"
                            />
</div>


<div class="mb-3 col-md-12">
<label for="property_address" class="form-label">Property Address</label>
                            <input
                              placeholder="0"
                              class="form-control"
                              type="text"
                              id="property_address"
                              name="property_address"
                              value="{{$property->property_address}}"
                            />
</div>


                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Save Property</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->

</form>
  </div>




                </div>
              </div>



    <div class="buy-now" id="deactivateButton">
      <a style="color:white;" 
        class="btn btn-danger btn-buy-now"
        >Delete Property</a
      >
    </div>


            </div>
            <!-- / Content -->
<script type="text/javascript">

  $(document).ready(function() {


  // Function to update the image preview
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imagePreview').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Add an event listener to the file input label
  $('#showFileDialog').click(function () {
    // Check if the file input is already open
    if (!$('#imageUpload').is(':focus')) {
      // Trigger a click event on the hidden file input
      $('#imageUpload').click();
    }
  });

  // Add an event listener to the file input
  $('#imageUpload').change(function () {
    // Call the readURL function when a file is selected
    readURL(this);
  });


    $('#reset').click(function() {
        // Your event handling code here
        $('#imagePreview').attr('src', "{{ (!empty($property->property_thumbnail)) ? asset('frontend/'.$property->property_thumbnail) : asset('frontend/upload/no_image.jpg') }}");
    });


document.getElementById('deactivateButton').addEventListener('click', function() {
    if (confirm("Are you sure you want to delete this property?\nOnce you delete, there is no going back. Please be certain.")) {
        // If the user clicks "OK" (Yes), proceed with the account deactivation
        window.location.href = '/admin/delete/property/{{$property->id}}';
    } else {
        // If the user clicks "Cancel" (No), do nothing
    }
});


});
  






</script>

@endsection