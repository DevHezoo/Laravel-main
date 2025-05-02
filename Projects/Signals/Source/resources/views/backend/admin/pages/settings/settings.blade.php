@extends('backend.admin.main.main')
@section('dashboard')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">My Website /</span> Edit</h4>

              <div class="row">
                <div class="col-md-12">


                  <div class="card mb-4">
                    <h5 class="card-header">Website Details</h5>



    <form method="post" action="{{ route('update.website.info') }}"  enctype="multipart/form-data" >
      @csrf


                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

<!-- Hidden file input for selecting an image -->
<input hidden type="file" name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" style="display: none;" />


<!-- Image preview element -->
<img
  src="{{ (!empty($seo->meta_icon)) ? asset('frontend/upload/website/'.$seo->meta_icon) : asset('frontend/upload/no_image.jpg') }}"
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
                            <label for="meta_website" class="form-label">Website Url</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_website"
                              name="meta_website"
                              value="{{$seo->meta_website}}"
                              autofocus
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="meta_title" class="form-label">Website Title</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_title"
                              name="meta_title"
                              value="{{$seo->meta_title}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_author" class="form-label">Author Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_author"
                              name="meta_author"
                              value="{{$seo->meta_author}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_keyword" class="form-label">Keyword</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_keyword"
                              name="meta_keyword"
                              value="{{$seo->meta_keyword}}"
                              autofocus
                            />
                          </div>



                          <div class="mb-3 col-md-12">
                            <label for="meta_description" class="form-label">Website Description</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_description"
                              name="meta_description"
                              value="{{$seo->meta_description}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_email" class="form-label">Email</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_email"
                              name="meta_email"
                              value="{{$seo->meta_email}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_phone" class="form-label">Phone</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_phone"
                              name="meta_phone"
                              value="{{$seo->meta_phone}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-12">
                            <label for="meta_address" class="form-label">Address</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_address"
                              name="meta_address"
                              value="{{$seo->meta_address}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_stripe_api" class="form-label">Stripe Publishable Key Api</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_stripe_api"
                              name="meta_stripe_api"
                              value="{{$seo->meta_stripe_api}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_stripe_client" class="form-label">Stripe Secret Key Client</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_stripe_client"
                              name="meta_stripe_client"
                              value="{{$seo->meta_stripe_client}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-12">
                            <label for="meta_map" class="form-label">Map Address</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_map"
                              name="meta_map"
                              value="{{$seo->meta_map}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_fb" class="form-label">FaceBook Link</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_fb"
                              name="meta_fb"
                              value="{{$seo->meta_fb}}"
                              autofocus
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="meta_tw" class="form-label">Twitter Link</label>
                            <input
                              class="form-control"
                              type="text"
                              id="meta_tw"
                              name="meta_tw"
                              value="{{$seo->meta_tw}}"
                              autofocus
                            />
                          </div>



                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Save Information</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->

</form>
                  </div>






                </div>
              </div>



<!--     <div class="buy-now" id="deactivateButton">
      <a style="color:white;" 
        class="btn btn-danger btn-buy-now"
        >Deactivate Account</a
      >
    </div> -->


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
        $('#imagePreview').attr('src', "{{ (!empty($seo->meta_icon)) ? asset('frontend/upload/website/'.$seo->meta_icon) : asset('frontend/upload/no_image.jpg') }}");
    });

});
  
</script>




@endsection