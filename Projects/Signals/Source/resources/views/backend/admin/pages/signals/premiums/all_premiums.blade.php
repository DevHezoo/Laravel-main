@extends('backend.admin.main.main')
@section('dashboard')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> Signal's</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Signals</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>By</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      



@foreach($signals as $key => $signal)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$signal->name}}</td>
        <td>{{$signal->status}}</td>


<td>
@if($signal->type === 'Buy')
<span class="badge bg-label-success">
    {{$signal->type}}
</span>
@elseif($signal->type === 'Sell')
<span class="bg-label-warning">
    {{$signal->type}}
</span>
@endif
</td>




        @php
            $author = App\Models\User::where('id', $signal->author_id)->first();
        @endphp   
        <td>{{$author->name}}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/view/signal_premium/{{$signal->id}}">
                        <i class="bx bx-edit-alt"></i> Edit
                    </a>
                    <a class="dropdown-item" href="/admin/delete/signal_premium/{{$signal->id}}">
                        <i class="bx bx-trash"></i> Delete
                    </a>
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
        href="/admin/new/signal_premium"
        class="btn btn-danger btn-buy-now"
        >Add New Premium Signal</a
      >
    </div>
    
     </div>


@endsection            