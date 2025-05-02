@extends('backend.admin.main.main')
@section('dashboard')
                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Blogs /</span> News</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Blog</a>
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
                    <h5 class="card-header">Blog Details</h5>



    <form method="post" action="{{ route('admin.edit.blog',$blog->id) }}"  enctype="multipart/form-data" >
      @csrf


                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

<!-- Hidden file input for selecting an image -->
<input hidden type="file" name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" style="display: none;" />


<!-- Image preview element -->
<img
  src="{{ (!empty($blog->article_img)) ? asset($blog->article_img) : asset('/frontend/upload/no_image.jpg') }}"
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

                          <div class="mb-3 col-md-12">
                            <label for="article_title" class="form-label">Article Title</label>
                            <input
                              class="form-control"
                              type="text"
                              name="article_title"
                              autofocus
                              value="{{$blog->article_title}}"
                            />
                          </div>


       

<!--     <div class="mb-3 col-md-6">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="select2 form-select">
            <option value="user" selected >User</option>
            <option value="premium">Premium</option>
            <option value="expert">Expert</option>
            <option value="admin">Admin</option>
        </select>
    </div> -->



                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="article_short_desc">Short Description</label>
                          <textarea
                            name='article_short_desc'
                            class="form-control"
                            placeholder="Blog Short Description"
                          >{{$blog->article_short_desc}}</textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="article_long_desc">Long Description</label>
                          <textarea
                            name='article_long_desc'
                            class="form-control"
                            placeholder="Blog Long Description"
                          >{{$blog->article_long_desc}}</textarea>
                        </div>


                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Update Article</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->

</form>

                  </div>








      <div class="card mb-4">
                    <h5 class="card-header">Comments</h5>


    <form method="post" action="#" id="deleteCommentForm">
      @csrf


                    <hr class="my-0" />
                    <div class="card-body">
                      <form>
                        <div class="row">

@if(count($comments) > 0)

    @foreach($comments as $comment)
        <div class="mb-3 col-md-10">
            <label for="comment" class="form-label">Comment #{{$loop->iteration}}</label>
            <input
            readonly
                class="form-control"
                type="text"
                name="comment"
                autofocus
                value="{{$comment->comment}}"
                placeholder="Comment Text"
            />
        </div>

        <div class="mb-3 col-md-2">
            <label  for="delete" class="form-label">   </label>
            <button type="submit" data-comment-id="{{ $comment->id }}" style="margin-top: 5px;" class="btn btn-primary me-2 form-control delete-comment-btn">Delete</button>
          
        </div>
    @endforeach
@else
   <p class="text-center">No Comments</p>
@endif


</div>

</form>

                  </div>
                </div>












                </div>
              </div>



    <div class="buy-now" id="deactivateButton">
      <a style="color:white;" 
        class="btn btn-danger btn-buy-now"
        >Deactivate Account</a
      >
    </div>


            </div>
            <!-- / Content -->


<script type="text/javascript">

  $(document).ready(function() {

    // Attach click event handler to delete buttons
    document.querySelectorAll('.delete-comment-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the comment ID from the data attribute
            var commentId = button.getAttribute('data-comment-id');
            
            // Set the comment ID in the form action
            document.getElementById('deleteCommentForm').action = '/admin/delete/blog/comment/' + commentId;
            
            // Submit the form
            document.getElementById('deleteCommentForm').submit();
        });
    });


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
        $('#imagePreview').attr('src', "{{ (!empty($blog->photo)) ? asset($blog->photo) : asset('/frontend/upload/no_image.jpg') }}");
    });


document.getElementById('deactivateButton').addEventListener('click', function() {
    if (confirm("Are you sure you want to delete your account?\nOnce you delete this account, there is no going back. Please be certain.")) {
        // If the user clicks "OK" (Yes), proceed with the account deactivation
        window.location.href = '/admin/delete/blog/{{$blog->id}}';
    } else {
        // If the user clicks "Cancel" (No), do nothing
    }
});


});
  






</script>

@endsection            