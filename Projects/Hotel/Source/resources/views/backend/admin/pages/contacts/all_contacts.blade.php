@extends('backend.admin.pages.main.main')
@section('admin')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> Contact's</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Contact's</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      



                     @foreach($contacts as $key => $contact)


                      <tr>
                        <td>{{$key+1}}</td>


                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$contact->name}}</strong></td>
                      


                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$contact->email}}</strong></td>

                       

                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$contact->subject}}</strong></td>
     

<td>
                   
<span class="badge @if($contact->status === 'read') bg-label-success @else bg-label-warning @endif">
    {{$contact->status}}
</span>

</td>


                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/admin/view/contact/{{$contact->id}}"
                                ><i class="bx bx-edit-alt"></i> Edit</a
                              >
                              <a class="dropdown-item" href="/admin/delete/contact/{{$contact->id}}"
                                ><i class="bx bx-trash"></i> Delete</a
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
        href="/admin/delete/all/contact"
        class="btn btn-danger btn-buy-now"
        >Delete All Contacts</a
      >
    </div>
    
     </div>
@endsection