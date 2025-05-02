@extends('backend.admin.pages.main.main')
@section('admin')

                       <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Orders /</span> Order</h4>

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



    <form method="post" action="{{ route('update.order.info',$order->id) }}">
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
                              value="{{$order->id}}"
                              readonly
                            />
                          </div>



@php
    $selectedProperty = \App\Models\Property::where('id', $order->Property_ID)->first();

    $selectedProperty_user = \App\Models\User::where('id', $order->UserID)->first();
@endphp



<div class="mb-3 col-md-6">
    <label for="Property_ID" class="form-label">Property Name</label>
    <select id="Property_ID" name="Property_ID" class="select2 form-select">
        @foreach($properties as $property)
            <option value="{{ $property->id }}" {{ $selectedProperty && $selectedProperty->id == $property->id ? 'selected' : '' }}>
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
                              value="{{$order->Property_Invoice_ID}}"
                              readonly
                            />
                          </div>

<div class="mb-3 col-md-6">
<label for="Identity_Number" class="form-label">Identity Number</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Identity_Number"
                              name="Identity_Number"
                              value="{{$order->Identity_Number}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="UserID" class="form-label">User ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="UserID"
                              name="UserID"
                              value="{{$order->UserID}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="name" class="form-label">User Full Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="{{$selectedProperty_user->name}}"
                              readonly
                            />
                          </div>

<div class="mb-3 col-md-6">
<label for="email" class="form-label">User Email</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{$selectedProperty_user->email}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">

<label for="phone" class="form-label">User Phone</label>
                            <input
                              class="form-control"
                              type="text"
                              id="phone"
                              name="phone"
                              value="{{$selectedProperty_user->phone}}"
                              readonly
                            />
                          </div>

 <hr class="my-1" />

<div class="mb-3 col-md-6">
<label for="Identity_Number" class="form-label">Identity Number</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Identity_Number"
                              name="Identity_Number"
                              value="{{$order->Identity_Number}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="Paid_Price" class="form-label">Paid Price $</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Paid_Price"
                              name="Paid_Price"
                              value="{{$order->Paid_Price}}"
                              readonly
                            />
                          </div>




<div class="mb-3 col-md-12">
<label for="Invoice_Code" class="form-label">Security Payment Token</label>
                            <input
                              class="form-control"
                              type="text"
                              id="Invoice_Code"
                              name="Invoice_Code"
                              value="{{$order->Invoice_Code}}"
                              readonly
                            />
                          </div>


<div class="mb-3 col-md-6">
<label for="Check_In" class="col-md-2 col-form-label">Check In</label>
                        <div class="col-md-10">
                          <input
                            class="form-control"
                            type="datetime-local"
                            value="{{ $order->Check_In }}T00:00:00"
                            id="Check_In"
                            name="Check_In"

                            readonly
                          />
                        </div>

                          </div>


<div class="mb-3 col-md-6">
<label for="Check_Out" class="col-md-2 col-form-label">Check Out</label>
                        <div class="col-md-10">
                          <input
                            class="form-control"
                            type="datetime-local"
                            value="{{ $order->Check_Out }}T00:00:00"
                            id="Check_Out"
                            name="Check_Out"

                            readonly
                          />
                        </div>

                          </div>



                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2 ">Save Order</button>
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
        >Delete Order</a
      >
    </div>


            </div>
            <!-- / Content -->
<script type="text/javascript">

  $(document).ready(function() {



document.getElementById('deactivateButton').addEventListener('click', function() {
    if (confirm("Are you sure you want to delete this Order?\nOnce you delete, there is no going back. Please be certain.\nwe will send email to invoice user who created this order to notify him that his order has been Deleted.")) {
        // If the user clicks "OK" (Yes), proceed with the account deactivation
        window.location.href = '/admin/delete/order/{{$order->id}}';
    } else {
        // If the user clicks "Cancel" (No), do nothing
    }
});


});
  






</script>

@endsection