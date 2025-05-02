@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Order /</span> Add</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> Order</a>
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
                    <h5 class="card-header">Order Details</h5>



    <form method="post" action="{{ route('add.order.info') }}">
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
    <label for="Property_ID" class="form-label">Property Name</label>
    <select id="Property_ID" name="Property_ID" class="select2 form-select">
        @foreach($properties as $property)
            <option value="{{ $property->id }}">
                {{ $property->property_slug }}
            </option>
        @endforeach
    </select>
</div>




<div class="mb-3 col-md-6">
<label for="Property_Invoice_ID" class="form-label">Invoice ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Property_Invoice_ID"
                              name="Property_Invoice_ID"
                            />
                          </div>

<div class="mb-3 col-md-6">
<label for="Identity_Number" class="form-label">Identity Number</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Identity_Number"
                              name="Identity_Number"
                            />
                          </div>


<div class="mb-3 col-md-6">
    <label for="UserID" class="form-label">User</label>
    <select id="UserID" name="UserID" class="select2 form-select">
        @foreach($users as $user)
            <option value="{{ $user->id }}">
                {{ $user->email }}
            </option>
        @endforeach
    </select>
</div>





<div class="mb-3 col-md-6">
<label for="Paid_Price" class="form-label">Paid Price $</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Paid_Price"
                              name="Paid_Price"
                            />
                          </div>




<div class="mb-3 col-md-12">
<label for="Invoice_Code" class="form-label">Security Payment Token</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Invoice_Code"
                              name="Invoice_Code"
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="Check_In" class="col-md-2 col-form-label">Check In</label>
                        <div class="col-md-10">
                          <input
                            class="form-control"
                            type="date"
                            id="Check_In"
                            name="Check_In"
                          />
                        </div>

                          </div>




<div class="mb-3 col-md-6">
<label for="Check_Out" class="col-md-2 col-form-label">Check Out</label>
                        <div class="col-md-10">
                          <input
                            class="form-control"
                            type="date"
                            id="Check_Out"
                            name="Check_Out"
                          />
                        </div>

                          </div>




                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Add Order</button>
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