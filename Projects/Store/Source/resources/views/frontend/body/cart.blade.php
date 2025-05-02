


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div style="border-radius: 15px; margin: 5px;" class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2 view-cart-btn">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            
            <div class="header-cart-total w-full p-tb-40 empty-cart">
        Your cart is empty.
    </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">




        @foreach(Cart::content() as $item)


            <li id="cart-item-{{ $item->rowId }}" class="header-cart-item flex-w flex-t m-b-12">


               <div class="header-cart-item-img remove-from-cart" data-row-id="{{ $item->rowId }}" data-qty="{{ $item->qty }}">
            <img style="border-radius: 10px;" src="{{ $item->options->image_url }}" alt="IMG">
        </div>
        <div class="header-cart-item-txt p-t-8">
            <a href="/shop/product/details/{{$item->id}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                {{ $item->name }} ({{ $item->qty }} Items)
            </a>
            <span class="header-cart-item-info">
                ${{ $item->price }}
            </span>
        </div>


            </li>
        @endforeach

                    
     
                

                </ul>
                
                <div class="w-full check-out">


            <div class="header-cart-total w-full p-tb-40 total">
                        Total: ${{ Cart::total() }}
                    </div>


                <div class="header-cart-buttons flex-w w-full">
                        <a href="/cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10 view-cart-btn">
                            
                        </a>

                           
                        <a href="/checkout" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>

                    </div>
                </div>





            </div>
        </div>
    </div>


<!--===============================================================================================-->

    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
<!--===============================================================================================-->

    <!-- // Handle if click in cart element to show up the cart view -->
<script type="text/javascript">

$(document).ready(function(){

    updateCartCount();

        // Handle Close "CartViewer"
     $('.js-show-cart').on('click', function() {
        // body...
        $('.js-panel-cart').addClass('show-header-cart');
    });

        $('.js-hide-cart').on('click', function() {
        // body...
        $('.js-panel-cart').removeClass('show-header-cart');    
    });
//////////////

// $('.header-cart-item-img.remove-from-cart, .header-cart-item-img.remove-cart').on('click', function() {
$(document).on('click', '.header-cart-item-img.remove-from-cart, .header-cart-item-img.remove-cart', function() {

     var rowId = $(this).data('row-id');
        var $itemElement = $('#cart-item-' + rowId); // Select the cart item element
        var qtyToRemove = $(this).data('qty'); // Get the quantity from data-qty attribute

        $.ajax({
            type: 'POST',
            url: '{{ route("cart.remove", ["rowId" => ":rowId"]) }}'.replace(':rowId', rowId),
            data: { row_id: rowId, _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.cartHtml) {

                toastr.success('Item removed from cart','Success');
                $itemElement.remove();

                // Remove Element From item-cart
                var $itemElementCart = $('#Cart-item-id-' + rowId); // Select the cart item element
                $itemElementCart.remove();
  

                // Get the formatted subtotal from Cart::subtotal()
                var formattedPrice = response.totalprc;

                // Update the total item price in your UI
                $('#total_item_price').text('$' + formattedPrice);

// Update the cart count
                updateCartCount();


                } else {
                    toastr.error('Failed to remove item from cart.', 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });

});


// Wishlist Ajax Handler Btn Click
$('.add-wishlist-btn').on('click', function() {
    // Ajax

var productid = $(this).data('product-id');

        $.ajax({ 
            type: 'POST',
            url: '{{ route("wishlist.add", ["ProductID" => ":productid"]) }}'.replace(':productid', productid),
            data: { 
                ProductID: productid,
                 _token: '{{ csrf_token() }}' },
            success: function(response) {
            
            if (response.message) {
                toastr.success(response.message,'Success');

                WishlistIncrementer();

            }else {
                    toastr.error(response.error, 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
});


// Compare Ajax Handler Btn Click
$('.add-compare-btn').on('click', function() {
    // Ajax

var productid = $(this).data('product-id');

        $.ajax({ 
            type: 'POST',
            url: '{{ route("compare.add", ["ProductID" => ":productid"]) }}'.replace(':productid', productid),
            data: { 
                ProductID: productid,
                 _token: '{{ csrf_token() }}' },
            success: function(response) {
            
            if (response.message) {
                toastr.success(response.message,'Success');

                CompareIncrementer();

            }else {
                    toastr.error(response.error, 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
});




});


// Function To Increment the Wishlist Number + 1

function WishlistIncrementer(){
    var wishlistElement = $("#wishlist_counter");
    var CurrentlyNumberWishlist = parseInt(wishlistElement.text().trim());
    wishlistElement.text(CurrentlyNumberWishlist + 1);
}   

function CompareIncrementer(){
    var compareElement = $("#compare_counter");
    var CurrentlyNumberCompare = parseInt(compareElement.text().trim());
    compareElement.text(CurrentlyNumberCompare + 1);
} 

// Function to update the cart count
function updateCartCount() {
    $.ajax({
        type: 'GET',
        url: '{{ route("cart.count") }}',
        success: function(response) {
            var newCartCount = parseInt(response.cartCount);
            // console.log(newCartCount);

            // Update the cart count displayed in the navigation .number-cart.number
            var cartCountElement = document.querySelector('.number-cart.number');
            cartCountElement.textContent = newCartCount;

    $('.header-cart-total.w-full.p-tb-40.total').html('Total: $' + response.totalprc + ' | (' + response.cartCount + ') Items');


            // Update the cart items here
            updateCartItems();

            // Check if cartCount is equal to 0
            if (newCartCount === 0) {
                // Cart is empty, show the empty cart message and hide the checkout button
                $('.header-cart-total.w-full.p-tb-40.empty-cart').show();
                $('.w-full.check-out').hide();
            } else {
                // Cart is not empty, hide the empty cart message and show the checkout button
                $('.header-cart-total.empty-cart').hide();
                $('.header-cart-total.w-full.p-tb-40.empty-cart').hide();
                $('.w-full.check-out').show();


if (newCartCount > 1) {
   // Equals > 1 items
     $('.view-cart-btn').text("View Carts");

} else {// Equals =1 item
    $('.view-cart-btn').text("View Cart");
    
}


            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}


function updateCartItems() {
    $.ajax({
        type: 'GET',
        url: '{{ route("cart.content") }}',
        success: function(response) {
            var cartItems = response.cartItems;
            // console.log(cartItems);

            // Check if cartItems is an object {Array}
            if (typeof cartItems === 'object' && cartItems !== null) {
                // Iterate through the properties of the object
                for (var key in cartItems) {
                    // Filtering the items that own a key's
                    if (cartItems.hasOwnProperty(key)) {
                        var item = cartItems[key];

                        var cartItemElement = $('#cart-item-' + item.rowId);
                        // console.log(item.qty + " Item " + item.id);
                        if (cartItemElement.length) {
                            // Update the quantity displayed in the cart item element
                            cartItemElement.find('.header-cart-item-name').text(item.name + ' (' + item.qty + ' Items)');
                        }
                    }
                }

            } else {
                console.error('Invalid cartItems response:', cartItems);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}



function updateCartItem(rowId, change) {
    var newQty = parseInt($('#item-cart-' + rowId).val()) + change;

    $.ajax({
        type: 'POST',
        url: '/cart/update/item',
        data: {
            rowId: rowId,
            quantity: newQty,
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.cartItem && response.totalPrice !== undefined) {
                // Update the UI with the new quantity and total price
                $('#item-cart-' + rowId).val(response.cartItem.qty);

                // console.log("id : " + rowId + "Qty : " + response.cartItem.qty)
                $('#total-price-' + rowId).text('$' + response.totalPrice.toFixed(2));

                // Get the formatted subtotal from Cart::subtotal()
                var formattedPrice = response.totalprc;

                // Update the total item price in your UI
                $('#total_item_price').text('$' + formattedPrice);


                updateCartCount();

            } else {
                console.error('Invalid server response:', response);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}




function increaseQty(rowId) {

    
var element = $('#item-cart-' + rowId);
if (element.length > 0 && parseInt(element.val()) < 10) {
    // Element with ID 'cart-item-' + rowId exists and its value is less than 3
    updateCartItem(rowId, 1); // Increase quantity by 1

toastr.success('Quantity Added in cart','Success');
}

    
}

function decreaseQty(rowId) {

    var element = $('#item-cart-' + rowId);
if (element.length > 0 && parseInt(element.val()) > 1) {
    // Element with ID 'cart-item-' + rowId exists and its value is less than 3
     updateCartItem(rowId, -1); // Decrease quantity by 1
toastr.error('Quantity Removed in cart','Success');
}


   
}





</script>
