@extends('backend.admin.pages.main.main')
@section('admin')

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage /</span> Properties</h4>


              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Properties</h5>
                <div class="table-responsive text-nowrap" style="max-height: 500px; overflow-y: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Img</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                     @foreach($properties as $key => $property)


                      <tr>
                        <td>{{$key+1}}</td>




<td>
<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
<li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Space Area: {{$property->property_area}} m2"
                            >

<div class="avatarr">  
<img src="{{ (!empty($property->property_thumbnail)) ? asset('frontend/'.$property->property_thumbnail) : asset('frontend/upload/no_image.jpg') }}" alt="Avatar" class="rounded-circle" />
</div>

</li>
</ul>
</td>


        @php
            $propertyType = \App\Models\PropertyType::where('id', $property->property_type)->first();
        @endphp



<td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$property->property_slug}}</strong></td>


<td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$propertyType->property_type}}</strong></td>


 <td>

@if ($property->property_price > 50)
    <span class="badge bg-label-success">
      {{$property->property_price}}
</span>
@else
    <span class="badge bg-label-warning">
    {{$property->property_price}}
</span>
@endif


 </td>


<td>
@if ($property->property_qty > 4)
<span class="badge bg-label-success">
{{$property->property_qty}}
</span>
@else
<span class="badge bg-label-warning">
{{$property->property_qty}}
</span>
@endif
</td>



                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/admin/view/property/{{$property->id}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="/admin/delete/property/{{$property->id}}"
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
        href="/admin/add/property"
        class="btn btn-danger btn-buy-now"
        >Add New Property</a
      >
    </div> 
    
     </div>
@endsection