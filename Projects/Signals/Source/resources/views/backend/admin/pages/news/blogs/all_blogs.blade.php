@extends('backend.admin.main.main')
@section('dashboard')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> Blog's</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Blog's</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Article</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      



                     @foreach($blogs as $key => $blog)


        @php
            $author = App\Models\User::where('id', $blog->article_author_id)->first();
        @endphp 

                      <tr>
                        <td>{{$key+1}}</td>

<td>
<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
<li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="{{$author->name}}"
                            >

@if($author->UserOnline())
<div class="avatarr avatar-onlinee">  
@else
<div class="avatarr avatar-offlinee">  
@endif
<img src="{{ (!empty($author->photo)) ? asset($author->photo) : asset('/frontend/upload/no_image.jpg') }}" alt="Avatar" class="rounded-circle" />
</div>

</li>
</ul>
</td>

 

<td>
<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
<li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="{{$blog->article_title}}"
                            >

<div class="avatarr">  

<img src="{{ (!empty($blog->article_img)) ? asset($blog->article_img) : asset('/frontend/upload/no_image.jpg') }}" alt="Avatar" class="rounded-circle" />
</div>

</li>
</ul>
</td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/admin/view/blog/{{$blog->id}}"
                                ><i class="bx bx-edit-alt"></i> Edit</a
                              >
                              <a class="dropdown-item" href="/admin/delete/blog/{{$blog->id}}"
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
        href="/admin/new/blog"
        class="btn btn-danger btn-buy-now"
        >Add New Blog</a
      >
    </div>
    
     </div>


@endsection            