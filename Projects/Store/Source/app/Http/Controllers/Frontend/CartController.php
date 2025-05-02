<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

use Auth;
use App\Models\User;
use App\Models\Seo;
use App\Models\Order;
use App\Models\OrderItem;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\Wishlist;
use App\Models\Compare;

class CartController extends Controller
{

    public function AddToCart(Request $request){

        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $quantity = $request->input('quantity');
        $product_img = $request->input('product_img');

        // When Adding new Item To Cart let's Fetching its data

        $product = Product::where('product_code', $product_id)->first();


        // Checking if not found this product,
        if(!$product){
            return response()->json(['message' => 'Product Not Found'],404);
        }

        $cartItem = Cart::add([

            'id' => $product_id,
            'name' => $product_name,
            'qty' => $quantity,
            'price' => $product_price,
            'weight' => 1,
            'options' => 
            [
                'image_url' => $product_img,
            ],

        ]);


        // Getting the row_id from Cart item, Porpuse, {update{Increase, Dicrease} Amount items , Delete}->cart
        $rowId = $cartItem->rowId;

        // Calculate the update cart total(cart_2=>totalprice)
        $cartTotal = Cart::total();

        return response()->json([
            'id' => $product_id,
            'message' => 'Item Added To Cart',
            'rowId' => $rowId,
            'cartTotal' => $cartTotal,
            'image_url' => $product_img,
        ],200);

    }

// Checker {GetCartsItems}
public function GetCartsItems(){
    $cartTotal = Cart::content();// Retrieve Cart Items
    return response()->json($cartTotal);
}


public function RemoveFromCart($rowId){

    try
    {


        Cart::remove($rowId); // Remove item by its row_id
        // Update Cart Total
        $cartTotal = Cart::total();

        // Calc The Total Price Of all Items in the cart
        $totalPrice = Cart::subtotal();

        return response()->json([
            'message' => 'Item Removed From The Cart',
            'cartHtml' => view('frontend.body.cart')->render(),
            'cartTotal' => $cartTotal,
            'totalprc' => $totalPrice,
        ], 200);
    } catch (\Exception $ex) {
         return response()->json([
            'message' => 'Failed to remove item from the cart',
            'error' => $ex->getMessage(),
        ], 500);
    }
}



public function GetCartCount(){
$cartTotal = Cart::total();
        // Calc The Total Price Of all Items in the cart
        $totalPrice = Cart::subtotal();

 return response()->json([
            'cartCount' => Cart::count(),
            'cartTotal' => $cartTotal,
            'totalprc' => $totalPrice,
        ], 200);
}

public function GetCartContent(){
    // Retrieve the Updated Cart Content

    $cartContent = Cart::content()->toArray(); // Convert To an Array
     return response()->json([
            'cartItems' => $cartContent,
        ], 200);
}


public function UpdateCartItem(Request $request){

    //Retrieve Saved Data From Ajax
    $product_id = $request->input('product_id');

    //Find The Cart item By Id
    $cartItem = Cart::search(function($cartItem, $rowId) use ($product_id){
         return $cartItem->id === $product_id;
    })->first();

// Checking if item Available
if($cartItem){
    Cart::update($cartItem->rowId, $cartItem->qty + 1);
     return response()->json(['row_id' => $cartItem->rowId]);
}else{
     return response()->json(['row_id' => null]);
}

}



public function UpdateCart(Request $request)
{
    // Rowid,Qty, Calcu (items*price), Total cart Sub {Total price items} ,response-> infos

            $rowId = $request->input('rowId');
            $quantity = $request->input('quantity');

            // Calc the Total price Before Sending the response
            $cartItem = Cart::get($rowId);
            $totalPriceItem = $cartItem->price * $quantity;

            // Check if the item exists in the cart
            if(!Cart::get($rowId)) {
                return response()->json(['message' => 'Cart Item Not Found'], 404);
            }

            // Continious the codes, if already item exists
            Cart::update($rowId, $quantity);

            // Calc The Total Price Of all Items in the cart
            $totalPrice = Cart::subtotal();

            return response()->json([
            'cartItem' => $cartItem,
            'totalPrice' => $totalPriceItem,
            'totalprc' => $totalPrice,
        ]);
}

public function Cart(){
    return view('frontend.pages.cart');
}

public function CheckoutCreate(){

    $user = User::where('id', Auth::user()->id)->first();

    return view('frontend.pages.checkout', compact('user'));
}

public function CashOrder(Request $request){

$total_amount = "";

//Session have Coupe or not,
if(Session::has('coupon')){
}else
{
    // 0.5000 * 100
    $total_amount = round(floatval(str_replace(",", "", Cart::subtotal()))); 
}

// Generation 24 Strings
$transaction_id = 'txn_' . Str::random(24);

// Generation 13 Strings
$order_number = bin2hex(random_bytes(13));

// Create order Request country(division),cario(district),street address(state_id)
$order = Order::insertGetId([

    'user_id' => Auth::id(),
    'division_id' => "0",
    'district_id' => "0",
    'state_id'=> "0",
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'adress' => $request->address,
    'post_code' => $request->post_code,
    'note' => $request->note,
    'send_as' => 'to:me',
    'payment_method' => 'Cash',
    'transaction_id' =>  $transaction_id,
    'currency' => "usd",
    'amount' => $total_amount,
    'order_number' => $order_number,
    'invoice_no' => 'Store_'.mt_rand(10000000,99999999),
    'order_date' => Carbon::now()->format('d F Y'),
    'order_month' => Carbon::now()->format('F'),
    'order_year' => Carbon::now()->format('Y'), 
    'status' => 'pending',
    'created_at' => Carbon::now(),  
]);


$inoivce = Order::findOrFail($order);

$data = [
    'invoice_no' => $inoivce->invoice_no,
    'amount' => $total_amount,
    'name' => $inoivce->name,
    'email' => $inoivce->email,
];


$carts = Cart::content();

// Save items that u stored in bag into db
foreach($carts as $cart){

    OrderItem::insert([
    'order_id' => $order,
    'product_id' => $cart->id,
    'vendor_id' => "0",
    'color' => "black",
    'size' => "S",
    'qty' => $cart->qty,
    'price' => $cart->price,
    'created_at' => Carbon::now()
    ]);
    

}// End foreach


// Check if Session has coupon
if (Session::has('coupon')){
    Session::forget('coupon');
}

Cart::destroy();

$notification = array(
'message' => 'Your Order Placed Sussefully',
'alert-type'=> 'success'
);

return redirect()->route('home')->with($notification);

}

public function StripeOrder(Request $request){

$seo = Seo::where('id', '1')->first();

\Stripe\Stripe::setApiKey($seo->Stripe_Secret_Key);


$token = $_POST['stripeToken'];
$total_amount = "";

//Session have Coupe or not,
if(Session::has('coupon')){
}else
{
    // 0.5000 * 100
    $total_amount = round(floatval(str_replace(",", "", Cart::subtotal()))); 
}


// Create Charge Request
$charge = \Stripe\Charge::create([

    'amount' => $total_amount * 100,
    'currency' => "usd",
    'description' => "By With Cash",
    'source'=> $token,
    'metadata' => ['order_id' => uniqid()]
]);

// Create order Request country(division),cario(district),street address(state_id)
$order = Order::insertGetId([

    'user_id' => Auth::id(),
    'division_id' => "0",
    'district_id' => "0",
    'state_id'=> "0",
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'adress' => $request->address,
    'post_code' => $request->post_code,
    'note' => $request->note,
    'send_as' => 'to:me',
    'payment_method' => 'Stripe',
    'transaction_id' => $charge->balance_transaction,
    'currency' => $charge->currency,
    'amount' => $total_amount,
    'order_number' => $charge->metadata->order_id,
    'invoice_no' => 'Store_'.mt_rand(10000000,99999999),
    'order_date' => Carbon::now()->format('d F Y'),
    'order_month' => Carbon::now()->format('F'),
    'order_year' => Carbon::now()->format('Y'), 
    'status' => 'pending',
    'created_at' => Carbon::now(),  
]);


$inoivce = Order::findOrFail($order);

$data = [
    'invoice_no' => $inoivce->invoice_no,
    'amount' => $total_amount,
    'name' => $inoivce->name,
    'email' => $inoivce->email,
];


$carts = Cart::content();

// Save items that u stored in bag into db
foreach($carts as $cart){

    OrderItem::insert([
    'order_id' => $order,
    'product_id' => $cart->id,
    'vendor_id' => "0",
    'color' => "black",
    'size' => "S",
    'qty' => $cart->qty,
    'price' => $cart->price,
    'created_at' => Carbon::now()
    ]);
    

}// End foreach


// Check if Session has coupon
if (Session::has('coupon')){
    Session::forget('coupon');
}

Cart::destroy();

$notification = array(
'message' => 'Your Order Placed Sussefully',
'alert-type'=> 'success'
);

return redirect()->route('home')->with($notification);
}

public function Wishlist(Request $request){
    
    $user = Auth::user()->id;

    $wishlist_items = Wishlist::where('user_id', $user)->get();


    return view('frontend.pages.wishlist', compact('wishlist_items'));
}

public function WishlistAdd(Request $request, $ProductID){

if(Auth::check()){

    $product = Wishlist::where('product_id', $ProductID)->first();


if(!$product){
    try
    {

        Wishlist::insert([
            'user_id' => auth()->user()->id,
            'product_id' => $ProductID,
            'updated_at' => Carbon::now(),  
            'created_at' => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'Item Added In Wishlist',
        ], 200);
    } catch (\Exception $ex) {
         return response()->json([
            'message' => 'Failed to add item to Wishlist',
            'error' => $ex->getMessage(),
        ], 500);
    }

}

else{
        return response()->json([
            'error' => 'Item Already Added To Wishlist',
        ], 200);
}


}else{
    
$notification = array(
'message' => 'You Need To login, First',
'alert-type'=> 'error'
);

return redirect()->route('home')->with($notification);

}




}

public function WishlistRemove(Request $request, $ProductID){


    try
    {


        Wishlist::where('product_id', $ProductID)->delete();

        return response()->json([
            'message' => 'Item Removed From Wishlist',
            'redirect' => route('wishlist.view'),
        ], 200);
    } catch (\Exception $ex) {
         return response()->json([
            'message' => 'Failed to remove item from Wishlist',
            'error' => $ex->getMessage(),
        ], 500);
    }


}




public function Compare(Request $request){
    
    $user = Auth::user()->id;

    $compare_items = Compare::where('user_id', $user)->get();


    return view('frontend.pages.compare', compact('compare_items'));
}

public function CompareAdd(Request $request, $ProductID){
$product = Compare::where('product_id', $ProductID)->first();


if(!$product){
    try
    {

        Compare::insert([
            'user_id' => auth()->user()->id,
            'product_id' => $ProductID,
            'updated_at' => Carbon::now(),  
            'created_at' => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'Item Added In Compare',
        ], 200);
    } catch (\Exception $ex) {
         return response()->json([
            'message' => 'Failed to add item to Compare',
            'error' => $ex->getMessage(),
        ], 500);
    }

}

else{
        return response()->json([
            'error' => 'Item Already Added To Compare',
        ], 200);
}

}

public function CompareRemove(Request $request, $ProductID){


    try
    {


        Compare::where('product_id', $ProductID)->delete();

        return response()->json([
            'message' => 'Item Removed From Compare',
            'redirect' => route('compare.view'),
        ], 200);
    } catch (\Exception $ex) {
         return response()->json([
            'message' => 'Failed to remove item from Compare',
            'error' => $ex->getMessage(),
        ], 500);
    }


}




}
