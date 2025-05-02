@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Contacts /</span> Contact</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Contact</a>
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
                    <h5 class="card-header">Contact Details</h5>



<form method="get" action="{{ route('delete.contact', $contacts->id) }}">
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
                              value="{{$contacts->id}}"
                              readonly
                            />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">name</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$contacts->name}}"
                            readonly />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{$contacts->email}}"
                              readonly
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <input
                              type="text"
                              class="form-control"
                              id="status"
                              name="status"
                              value="{{$contacts->status}}"
                              readonly
                            />
                          </div>




                      <div class="mb-3 col-md-12">
                        <label for="property_long_desc" class="form-label">Message</label>
                        <textarea class="form-control" name="property_long_desc" id="property_long_desc" rows="5"
                        readonly>{{$contacts->message}}</textarea>
                      </div>


                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Delete Contact</button>
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
        >Deactivate Account</a -->
      
    </div>


            </div>
            <!-- / Content -->

  



</script>

@endsection