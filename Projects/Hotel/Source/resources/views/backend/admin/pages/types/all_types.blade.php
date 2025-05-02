@extends('backend.admin.pages.main.main')
@section('admin')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> Types</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Types</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                     @foreach($types as $key => $type)


                      <tr>
                        <td>{{$key+1}}</td>




<td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$type->property_type}}</strong></td>


                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/admin/view/type/{{$type->id}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="/admin/delete/type/{{$type->id}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>



                      </tr>

             @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />


     <div class="buy-now">
      <a
        href="/admin/add/type"
        class="btn btn-danger btn-buy-now"
        >Add New Type</a
      >
    </div> 
    
     </div>
@endsection