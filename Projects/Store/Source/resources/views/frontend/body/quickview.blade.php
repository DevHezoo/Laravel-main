<!-- Quickview File, HTML -> Blade PHP -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('frontend/extra/js/jquery.js') }}"></script>



<div style="border-radius: 20px;"  class="modal fade custom-modal products-preview" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">



                 <div  class="blog_right_sidebar">


                        <aside class="single-sidebar-widget tag_cloud_widget">


  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal">

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart" >
                    <i class="zmdi zmdi-close"></i>
                </div>

</button>

                            <h4 style="border-radius: 20px;margin-top: 10px;" class="widget_title" id='saleOff'></h4>


 
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img style="border-radius: 20px;" height="280" width="260" class="img-fluid" id='productImg' alt="">
                    </div>
                    <div class="col-md-6">
                        <h3 class="title" id='productName'></h3>
                        <div class="stars">
                            <i class="lnr lnr-star"></i>
                            <i class="lnr lnr-star"></i>
                            <i class="lnr lnr-star"></i>
                            <i class="lnr lnr-star"></i>
                            <i class="lnr lnr-star"></i>

                        </div>
                      


                    <div style="display: flex; justify-content: center; align-items: center;">
                     <span class="mr-2" id='productPrice'></span>
                     <span style="text-decoration: line-through;" class="text-danger" id='discountPrice'></span>
                    </div>

  <p style="text-align: center;" id='productDesc'></p>


                        <div class="buttons mt-3">

                <div class="col-md-12 form-group">


<button id='add-to-cart-btn' type="submit" value="submit" class="primary-btn add-to-cart" data-code="">Add To Cart</button>

            </div>


                        </div>
 


                    </div>
                </div>
            </div>
    

                        </aside>

<a id='productLink' style="" href="" class="genric-btn default circle arrow"><b>View</b><span class="lnr lnr-arrow-right"></span></a>



                    </div>
 </div>



      
    </div>


</div>



<style type="text/css">
/* Modal Title Styles */
/* Modal Title Styles */

/* Modal Body Styles */
.modal-body {
    padding: 30px;
}

/* Product Image Styles */
#productImg {
    max-width: 100%;
    height: auto;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
    transition: transform 0.3s ease-in-out;
}

#productImg:hover {
    transform: scale(1.1);
}

/* Product Name Styles */
#productName {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Star Rating Styles */
.stars {
    color: #f39c12;
    text-align: center;
    margin-top: 15px;
}

.stars i {
    font-size: 24px;
}

/* Product Description Styles */
#productDesc {
    font-size: 18px;
    line-height: 1.6;
    color: #555;
    margin-top: 20px;
}

/* Product Price Styles */
#productPrice {
    font-size: 28px;
    color: #27ae60;
    margin-top: 20px;
    text-align: center;
}

/* Buttons Styles */
.buttons {
    margin-top: 30px;
    text-align: center;
}

.buttons a {
    display: inline-block;
    padding: 15px 30px;
    font-size: 20px;
    text-align: center;
    text-transform: uppercase;
    border-radius: 5px;
    margin-right: 15px;
    color: #fff;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
}

.buttons a.btn-primary {
    background-color: #27ae60;
}

.buttons a.btn-success {
    background-color: #f39c12;
}

.buttons a:hover {
    transform: scale(1.05);
}

/* Close Button Styles */
.btn-close {
    font-size: 28px;
    color: #333;
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

/*.btn-close:hover {
    transform: scale(1.2) rotate(45deg);
}*/

/* Background Overlay Styles */
.modal-backdrop.show {
    opacity: 0.7 !important;
    background-color: #000 !important;

}

/* Buttons Styles */
.buttons {
    margin-top: 30px;
    text-align: center;
}

.buttons a {
    display: inline-block;
    padding: 10px 20px; /* Adjust padding here */
    font-size: 20px;
    text-align: center;
    text-transform: uppercase;
    border-radius: 5px;
    margin-right: 15px;
    color: #fff;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
}

.buttons a.btn-primary {
    background-color: #27ae60;
}

.buttons a.btn-success {
    background-color: #f39c12;
}

.buttons a:hover {
    transform: scale(1.05);
}

/* Responsive Styles */
@media (max-width: 768px) {
    /* On smaller screens, adjust the column layout */
    .modal-body .row {
        flex-direction: column;
        align-items: center;
    }
    .col-md-6 {
        text-align: center;
    }
    .buttons {
        margin-top: 30px;
    }
}

</style>


<!-- 
id='saleOff'
id='productImg'
id='productName'
id='productPrice'
id='discountPrice'
id='productLink'
-->

<script type="text/javascript">
    // Global Scope Variables
	var modalInstance; // Declare quickViewModal in a higher scope
    var productID;
    var productName;
    var productPrice;
    var productDiscount;
    var productImg;
    var Img_Path;
    var quantity;
    var rowId;


	function openQuickViewModal(element) {


    var modal = document.getElementById('quickViewModal');
    modalInstance = new bootstrap.Modal(modal);

    // Set Data Of Product Name
    productName = element.getAttribute('data-name');
    var productElement_1 =  document.getElementById('productName');
    productElement_1.textContent = productName;

    // Product Price Infos
    productPrice = parseFloat( element.getAttribute('data-price') );
    productDiscount = parseFloat( element.getAttribute('data-disc') );

    // Set Data Of Product Image
    productImg = element.getAttribute('data-img');



    // Get The Base Url Dynamically : 'http://127.0.0.1:8000/'
    var Base_URL = window.location.origin;
    var productElement_2 =  document.getElementById('productImg');
    productElement_2.src =  Base_URL + '/frontend/' + productImg;


    // Calculate the Discount Percentage
    var DiscountPercent = ( (productDiscount - productPrice) / productDiscount) * 100;
    var productElement_3 = document.getElementById('saleOff');
    productElement_3.textContent = 'Sale : ('+ DiscountPercent.toFixed(0) + '%) Off';


    // Set Data Of Product Description
    productDesc = element.getAttribute('data-desc');
    var productElement_4 =  document.getElementById('productDesc');
    productElement_4.textContent = productDesc;

    // Set Data Of Product Price
    productPrice = element.getAttribute('data-price');
    var productElement_5 =  document.getElementById('productPrice');
    productElement_5.textContent = '$' + productPrice;

    // Set Data Of Product Discount
    productDiscount = element.getAttribute('data-disc');
    var productElement_6 =  document.getElementById('discountPrice');
    productElement_6.textContent = '$' + productDiscount;

    // Set Data Of Product ID
    productID = element.getAttribute('data-code');
    var productElement_7 =  document.getElementById('productLink');
    productElement_7.href = '/shop/product/details/' + productID;

    // Adding Listener Close Button
    var Closingbutton = document.querySelector('#quickViewModal .btn-close');
    Closingbutton.addEventListener('click', 
        function(){
            modalInstance.hide();
        }
        );

// Retrive Product id and save to Button Addtocart-> id {data-code}
    var addToCartButton = document.getElementById('add-to-cart-btn');
    addToCartButton.setAttribute('data-code', productID);


    modalInstance.show();
}


// Clicked handle 'AddtoCart' Button

document.getElementById('add-to-cart-btn').addEventListener('click', function(){

    handle_add_tocart();
});


// document.getElementById('add-to-cart-btn2').addEventListener('click', function(){

//     handle_add_tocart();
// });

// Function Handle Clickable

function handle_add_tocart() {
    // Set qty as => 1, adding new product qty->1
    quantity = 1;

    // Retrive Img Path {upload/fronte....etc} || ProductImg=> upload/fronte || Img_Path=> 127.0.0.1:8080/fronent..
    Img_Path = new URL( 'frontend/' + productImg, window.location.origin);
    Img_Path = Img_Path.href;

    // Handle if already this product in your cart.
    checker();

    //
    closeModel();
    // body...
}

// Handle to forced Close Quickview
function closeModel() {
    if(modalInstance){
        modalInstance.hide();
    }
}

function AddtoCart(){


                $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    product_id: productID,
                    product_name: productName,
                    product_price: productPrice,
                    quantity: quantity,
                    product_img: Img_Path,
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    // alert(response.message);

                        Swal.fire({
        title: productName,
        text: response.message,
        icon: 'success',
        confirmButtonText: 'Done'
    });



// Use the rowId from the response to uniquely identify the cart item
            rowId = response.rowId;
// console.log("ID : " + rowId)
            // Create a new cart item element
            var cartItem = `
                <li id="cart-item-${rowId}" class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img remove-from-cart" data-row-id="${rowId}" data-qty="${quantity}">
                        <img style="border-radius: 10px;" src="${Img_Path}" alt="IMG">
                    </div>
                    <div class="header-cart-item-txt p-t-8">
                        <a href="/shop/product/details/${response.id}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            ${productName} (${quantity} Items)
                        </a>
                        <span class="header-cart-item-info">
                            $${productPrice}
                        </span>
                    </div>
                </li>
            `;

            // Append the cart item to the cart list
            $('.header-cart-wrapitem.w-full').append(cartItem);

updateCartCount();

                },

                 error: function (xhr, status, error) {

        Swal.fire({
        title: productName,
        text: error ,
        icon: 'error',
        confirmButtonText: 'Ok'

       


    });

        },


            });

}

// Function to check if a product is in the cart and increment its quantity
function checker() {

    $.ajax({
        url: '/get-cart', // Replace with the actual URL of your getCart() function
        method: 'GET',
        success: function(response) {

            // Create an object to store cart items
            var items = {};

            // Iterate through the properties of the response object
            // Get Response of all cart content, get values (key:value)
            for (const key in response) {
                if (response.hasOwnProperty(key)) {
                    const item = response[key];
                    items[item.id] = item; // Store all the item id, in array list
                }
            }

            // Check if the productID exists in the cart
            if (items.hasOwnProperty(productID)) {

                update();
            } else {


            AddtoCart();
            }

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

}

// Example usage: checker('4'); // Replace '4' with the actual product ID you want to check


// Function to check if a product is in the cart and increment its quantity
function update() {
// Step 1: Find the row_id by product_id
    $.ajax({
        url: '/cart/update', // Replace with the actual URL of your findRowIdByProduct() function
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id: productID,
        },
        success: function(response) {
                // console.log('Found Row ID: ' + response.row_id); // Log the row_id

            if (response.row_id) {
                // Step 2: Once you have the row_id, update the cart item quantity
                $.ajax({
                    url: '/cart/update', // Replace with the actual URL of your updateCartItem() function
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        rowId: response.row_id,
                    },
                    success: function(updateResponse) {
                        
                        updateCartCount();

                        Swal.fire({
        title: productName,
        text: 'Item added Again to cart' ,
        icon: 'success',
        confirmButtonText: 'Done'
    });




                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                console.error('Row ID not found for product ID: ' + productID);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

</script>
