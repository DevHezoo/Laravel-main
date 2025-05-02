@extends('backend.admin.main.main')
@section('dashboard')
                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Premiums /</span> Signals</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> New Signal</a>
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
                    <h5 class="card-header">Signal Details</h5>



    <form method="post" action="{{ route('admin.create.new.premium.signal') }}"  enctype="multipart/form-data" >
      @csrf


<div class="row">
  <div class="mb-3 col-md-6">
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <input hidden type="file" name="photo_1" id="imageUpload_1" accept=".png, .jpg, .jpeg" style="display: none;" />
        <img src="{{ asset('/frontend/upload/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="imagePreview_1" />
        <div class="button-wrapper">
          <label for="upload_1" class="btn btn-primary me-2 mb-4" tabindex="0">
            <label for="imageUpload_1" tabindex="0">
              <span class="d-none d-sm-block">
                Upload
              </span>
            </label>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" id="upload_1" class="account-file-input" hidden accept="image/png, image/jpeg" />
          </label>
          <button id='reset_1' type="button" class="btn btn-outline-secondary account-image-reset mb-4">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
          </button>
          <p class="text-muted mb-0">Upload Signal 1 > IMG</p>
        </div>
      </div>
    </div>
  </div>

  <div class="mb-3 col-md-6">
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <input hidden type="file" name="photo_2" id="imageUpload_2" accept=".png, .jpg, .jpeg" style="display: none;" />
        <img src="{{ asset('/frontend/upload/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="imagePreview_2" />
        <div class="button-wrapper">
          <label for="upload_2" class="btn btn-primary me-2 mb-4" tabindex="0">
            <label for="imageUpload_2" tabindex="0">
              <span class="d-none d-sm-block">
                Upload
              </span>
            </label>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" id="upload_2" class="account-file-input" hidden accept="image/png, image/jpeg" />
          </label>
          <button id='reset_2' type="button" class="btn btn-outline-secondary account-image-reset mb-4">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
          </button>
          <p class="text-muted mb-0">Upload Signal 2 > IMG</p>
        </div>
      </div>
    </div>
  </div>
</div>



                    <hr class="my-0" />
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input
                              class="form-control"
                              type="text"
                              name="name"
                              autofocus
                              placeholder="Trade Name"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="date" class="form-label">Date : DD-MM-YYYY HH:MMPM</label>
                            <input class="form-control" type="text" name="date" placeholder="10-07-2024 04:55PM" />
                          </div>

                          <div class="mb-3 col-md-4">
                            <label for="email" class="form-label">Status</label>
                            <input
                              class="form-control"
                              name="status"
                              placeholder="Active - Waiting / Active - Tp-1"
                            />
                          </div>

    <div class="mb-3 col-md-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" class="select2 form-select">
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
        </select>
    </div>

                          <div class="mb-3 col-md-5">
                            <label for="open_price" class="form-label">Open Price</label>
                            <input
                              class="form-control"
                              name="open_price"
                              placeholder="Open Price"
                            />
                          </div>


                          <div class="mb-3 col-md-4">
                            <label for="profit_1" class="form-label">Take Profit #1</label>
                            <input
                              class="form-control"
                              name="profit_1"
                              placeholder="Profit #1"
                            />
                          </div>

                          <div class="mb-3 col-md-4">
                            <label for="profit_2" class="form-label">Take Profit #2</label>
                            <input
                              class="form-control"
                              name="profit_2"
                              placeholder="Profit #2"
                            />
                          </div>

                          <div class="mb-3 col-md-4">
                            <label for="profit_3" class="form-label">Take Profit #3</label>
                            <input
                              class="form-control"
                              name="profit_3"
                              placeholder="Profit #3"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="stop_loss" class="form-label">Stop Loss</label>
                            <input
                              class="form-control"
                              name="stop_loss"
                              placeholder="Stop Loss"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="profit_loss" class="form-label">Profit Loss</label>
                            <input
                              class="form-control"
                              name="profit_loss"
                              placeholder="Profit Loss"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="trade_result" class="form-label">Trade Result</label>
                            <input
                              class="form-control"
                              name="trade_result"
                              placeholder="Trade Result"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="trade_probability" class="form-label">Trade Probability</label>
                            <input
                              class="form-control"
                              name="trade_probability"
                              placeholder="Trade Probability"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="time_frame" class="form-label">Time Frame</label>
                            <input
                              class="form-control"
                              name="time_frame"
                              placeholder="Time Frame"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="last_update_time" class="form-label">Last Update Time</label>
                            <input
                              class="form-control"
                              name="last_update_time"
                              placeholder="Last Update Time"
                            />
                          </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="comment">Comment</label>
                          <textarea
                            name='comment'
                            class="form-control"
                            placeholder="Comment"
                          ></textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="long_description">Long Description</label>
                          <textarea
                            name='long_description'
                            class="form-control"
                            placeholder="Signal Long Description"
                          ></textarea>
                        </div>

                          <div class="mb-3 col-md-6" hidden>
                            <label for="signal_type" class="form-label">Signal Type</label>
                            <input
                              class="form-control"
                              name="signal_type"
                              value = 3
                            />
                          </div>

                          <div class="mb-3 col-md-6" hidden>
                            <label for="author_id" class="form-label">Author ID</label>
                            <input
                              class="form-control"
                              name="author_id"
                              placeholder="Author ID"
                              value = "{{$admin->id}}"
                            />
                          </div>
</div>

                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Create Signal</button>
                        </div>

                    <!-- /Account -->

</form>

                  </div>



                </div>
              </div>



    <div class="buy-now" id="deactivateButton">
      <a style="color:white;" 
        class="btn btn-danger btn-buy-now"
        >Back</a
      >
    </div>


            </div>
            <!-- / Content -->


<script type="text/javascript">

  $(document).ready(function() {

  var imagePreviewSrc = "{{ asset('/frontend/upload/no_image.jpg') }}";

  // Function to update the image preview
  function readURL_1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imagePreview_1').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Add an event listener to the file input label
  $('#showFileDialog_1').click(function () {
    // Check if the file input is already open
    if (!$('#imageUpload_1').is(':focus')) {
      // Trigger a click event on the hidden file input
      $('#imageUpload_1').click();
    }
  });

  // Add an event listener to the file input
  $('#imageUpload_1').change(function () {
    // Call the readURL function when a file is selected
    readURL_1(this);
  });


    $('#reset_1').click(function() {
        // Your event handling code here
        $('#imagePreview_1').attr('src', imagePreviewSrc);
    });


 // ////////////////////


      // Function to update the image preview
  function readURL_2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imagePreview_2').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Add an event listener to the file input label
  $('#showFileDialog_2').click(function () {
    // Check if the file input is already open
    if (!$('#imageUpload_2').is(':focus')) {
      // Trigger a click event on the hidden file input
      $('#imageUpload_2').click();
    }
  });

  // Add an event listener to the file input
  $('#imageUpload_2').change(function () {
    // Call the readURL function when a file is selected
    readURL_2(this);
  });


    $('#reset_2').click(function() {
        // Your event handling code here
        $('#imagePreview_2').attr('src', imagePreviewSrc);
    });



document.getElementById('deactivateButton').addEventListener('click', function() {

        window.location.href = '/admin/view/signals_premium';

});


});
  






</script>

@endsection            