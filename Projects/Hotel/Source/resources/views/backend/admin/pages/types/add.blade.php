@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Types /</span> Add</h4>

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



    <form method="post" action="{{ route('add.type.info') }}">
      @csrf


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
                              value="{{$counter}}"
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
                            />
                          </div>




                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Add Type</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->

</form>
  </div>




                </div>
              </div>


<!-- 
    <div class="buy-now" id="deactivateButton">
      <a style="color:white;" 
        class="btn btn-danger btn-buy-now"
        >Delete Property</a
      >
    </div>
 -->

            </div>
            <!-- / Content -->



</script>

@endsection