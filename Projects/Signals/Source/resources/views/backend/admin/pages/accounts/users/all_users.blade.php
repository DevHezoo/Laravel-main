@extends('backend.admin.main.main')
@section('dashboard')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> User's</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All User's</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Last Seen</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      



                     @foreach($users as $key => $user)


                      <tr>
                        <td>{{$key+1}}</td>

<td>
<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
<li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="{{$user->name}}"
                            >

@if($user->UserOnline())
<div class="avatarr avatar-onlinee">  
@else
<div class="avatarr avatar-offlinee">  
@endif
<img src="{{ (!empty($user->photo)) ? asset($user->photo) : asset('/frontend/upload/no_image.jpg') }}" alt="Avatar" class="rounded-circle" />
</div>

</li>
</ul>
</td>

                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$user->email}}</strong></td>
        
                        <td>

<span class="badge @if($user->status === 'active') bg-label-success @else bg-label-warning @endif">
    {{$user->status}}
</span>

</td>

 <td>

@if($user->last_seen)
    <span class="badge bg-label-primary">
      @if($user->UserOnline())
        Online
      @else
          {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->last_seen)->diffForHumans() }}
      @endif

</span>
@else
    <span class="badge bg-label-primary">
    Never
</span>
@endif


 </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/admin/view/user/{{$user->id}}"
                                ><i class="bx bx-edit-alt"></i> Edit</a
                              >
                              <a class="dropdown-item" href="/admin/delete/user/{{$user->id}}"
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

              <!-- <hr class="my-5" /> -->


    <div class="buy-now">
      <a
        href="/admin/new/user"
        class="btn btn-danger btn-buy-now"
        >Add New User</a
      >
    </div>
    
     </div>


@endsection            