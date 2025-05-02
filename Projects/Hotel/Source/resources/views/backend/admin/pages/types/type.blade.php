@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Types /</span> Type</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Type</a>
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
                    <h5 class="card-header">Type Details</h5>



    <form method="post" action="{{ route('update.type.info',$type->id) }}">
      @csrf


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
                              value="{{$type->id}}"
                              readonly
                            />
                          </div>





<div class="mb-3 col-md-6">
<label for="property_type" class="form-label">Type Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="property_type"
                              name="property_type"
                              value="{{$type->property_type}}"
                            />
                          </div>





                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Save Type</button>
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
        >Delete Type</a
      >
    </div>


            </div>
            <!-- / Content -->
<script type="text/javascript">

  $(document).ready(function() {



document.getElementById('deactivateButton').addEventListener('click', function() {
    if (confirm("Are you sure you want to delete this type?\nOnce you delete, there is no going back. Please be certain.")) {
        // If the user clicks "OK" (Yes), proceed with the account deactivation
        window.location.href = '/admin/delete/type/{{$type->id}}';
    } else {
        // If the user clicks "Cancel" (No), do nothing
    }
});


});
  






</script>

@endsection