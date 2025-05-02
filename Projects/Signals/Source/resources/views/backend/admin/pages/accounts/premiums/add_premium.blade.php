@extends('backend.admin.main.main')
@section('dashboard')
                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Premiums /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> New Account</a>
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
                    <h5 class="card-header">Profile Details</h5>



    <form method="post" action="{{ route('admin.add.premium') }}"  enctype="multipart/form-data" >
      @csrf


                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

<!-- Hidden file input for selecting an image -->
<input hidden type="file" name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" style="display: none;" />


<!-- Image preview element -->
<img
  src="{{ asset('/frontend/upload/no_image.jpg') }}"
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
                            <label for="name" class="form-label">Full Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">username</label>
                            <input class="form-control" type="text" name="username" id="username" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="email"
                              id="email"
                              name="email"
                              placeholder="example@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="identity" class="form-label">Address</label>
                            <input
                              type="text"
                              class="form-control"
                              id="identity"
                              name="identity"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phone">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"></span>
                              <input
                                type="text"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="+XX xxx xxx xxx"
                              />
                            </div>
                          </div>

    <div class="mb-3 col-md-6">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="select2 form-select">
            <option value="user">User</option>
            <option value="premium" selected>Premium</option>
            <option value="expert">Expert</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <div class="mb-3 col-md-6">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="select2 form-select">
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-message">Short Description</label>
                          <textarea
                            name='vendor_short_info'
                            id="basic-default-message"
                            class="form-control"
                            placeholder="Hi, Do you have a moment to talk Joe?"
                          ></textarea>
                        </div>


                          <div class="mb-3 col-md-12">
                            <label for="password" class="form-label">New Password</label>
                            <input
                              class="form-control"
                              type="password"
                              id="password"
                              name="password"
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
        $('#imagePreview').attr('src', "asset('/frontend/upload/no_image.jpg') }}");
    });


document.getElementById('deactivateButton').addEventListener('click', function() {

        window.location.href = '/admin/view/premiums';

});


});
  






</script>

@endsection            