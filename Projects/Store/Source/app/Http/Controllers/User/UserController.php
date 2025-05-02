<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

// import user, Hashing
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Seo;
use App\Models\Product;
use App\Models\Contact;

use Carbon\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{

    // Home Page, Store.
    public function UserProfile(){

    	// Fetching currently auth user id,
    	$id = Auth::user()->id;

    	// Fetching user Data
    	$userData = User::find($id);

      // Get oldest order ('asc') <Ascending>, Get Newest order ('desc') <Descending>

      // Handle if order status-> cancel {Dont add it}
      $orders = Order::where('user_id', $id)->where('status', '!=', 'cancel')
      ->orderBy('id', 'desc')->get();
      
      // Filter Cancel order only
      $orders_return = Order::where('user_id', $id)->where('status', '=', 'cancel')
      ->orderBy('id', 'desc')->get();

      // Import Tickets
      $tickets = Contact::where('user_id', $id)->orderBy('created_at','desc')->get();

      	return view('frontend.pages.profile', compact('userData','orders','orders_return','tickets'));
    }


    public function UserInfo(Request $request){

    	// Fetching currently auth user id,
    	$id = Auth::user()->id;

    	// Fetching user Data {Array list}
    	$Data = User::find($id);
    	// Set Db from Form Inbuts (name,social_link....etc)
    	$Data->name = $request->name;
    	$Data->phone = $request->phone;
    	$Data->address = $request->address;
    	$Data->social_link = $request->social_link;

    	// Check if photo uploaded.
    	if ($request->file('photo')){
    		$file = $request->file('photo');

    		//Remove old picture from db, also from file
    		@unlink(public_path('frontend/upload/user_images/' .$Data->photo));

    		$filename = date('YmdHi').$file->getClientOriginalName();

    		// Moving the file to main folder /user_images
    		// $file->move(public_path('frontend/user_images/' .$filename));
			$file->move(public_path('frontend/upload/user_images/'), $filename);

			// Passing the file path to the db
			$Data['photo'] = $filename;
    	}


    	// Save the DB
    	$Data->save();

    	$notification = array(
            'message' => 'User Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);

    }
    public function UserPass(Request $request){
    	// Validation Old Password, with new Password

    	$request->validate([
    		'old_password' => 'required',
    		'new_password' => 'required|confirmed',
    	]);

    	// Matching tge old Password
    	if(!Hash::check($request->old_password, auth::user()->password)){

    		// They are the same, now we can update the new password, with hashing it.
    		// Update The new Password


		$notification = array(
            'message' => 'User Password Not Correctly, Error',
            'alert-type' => 'error'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);

    	}else{

    
    		User::whereId(Auth::user()->id)->update([
    			'password' => Hash::make($request->new_password)
    		]);

    	$notification = array(
            'message' => 'User Password Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);


    	}

    }


public function UserOrder(Request $request, $Order_Number){

   // Getting Order Row
   $order = Order::where('order_number', $Order_Number)->first();

   // Collecting All Order Items
   $items = OrderItem::where('order_id', $order->id)->get();

   // Seo Setting
   $seo = Seo::where('id','1')->first();

   // Fetching User Whos made this order
   // Notes : Multi Select Rows => ger() , Single row => first()
   $user = User::where('id', $order->user_id)->first();

   // Dict, Seats' -> Array list To Store Our Items in single order
   $products = [];

   // Foreach->Fetching all items in the Order
   foreach ($items as $item){
      $product = Product::find($item->product_id);

      if($product){
         $products[] = $product;
      }
   }

   // Collect all info as one
   $infos = [
      'seo' => [
    'seo_meta_title' => $seo->meta_title,
    'seo_meta_website' => $seo->meta_website,
    'seo_meta_author' => $seo->meta_author,
    'seo_meta_email' => $seo->meta_email,
    'seo_meta_phone' => $seo->meta_phone,
    'seo_meta_address' => $seo->meta_address,
    'seo_meta_description' => $seo->meta_description,
    'seo_meta_keyword' => $seo->meta_keyword,

      ],

'user' => [
    'user_name' => $user->name,
    'user_email' => $user->email,
      ],

'order' => [
    'id' => $order->id,
    'Invoice_ID' => $order->invoice_no,
    'UserID' => $order->user_id,
    'phone' => $order->phone,
    'Paid_Price' => $order->amount,
    'Payment_Type' => $order->payment_method,
    'Currency' => $order->currency,
    'Invoice_Code' => $order->transaction_id,
    'created_at' => $order->created_at,

      ],

   ];
   return view('frontend.extra.invoices.user_order_view', compact('items','products','infos'));
}

public function UserOrderCancel(Request $request, $Order_Number){

   // Getting Order Row
   $order = Order::where('order_number', $Order_Number)->first();

   if($order){
      // Update The Status order to "Cancel"
      $order->update([
         'status' => 'cancel',
      ]);



      $notification = array(
            'message' => 'Order Canceled, Successfully',
            'alert-type' => 'error'
        );

         return redirect()->back()->with($notification);

   }else{
            $notification = array(
            'message' => 'Order Not Found',
            'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
   }

}

public function UserOrderReturn(Request $request, $Order_Number){

   // Getting Order Row
   $order = Order::where('order_number', $Order_Number)->first();

   if($order){
      // Update The Status order to "Cancel"
      $order->update([
         'status' => 'pending',
      ]);


      $notification = array(
            'message' => 'Order Return, Successfully',
            'alert-type' => 'success'
        );

         return redirect()->back()->with($notification);

   }else{
            $notification = array(
            'message' => 'Order Not Found',
            'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
   }

}



// Track Page

public function Track(Request $request){

   return view('frontend.pages.track');

}

public function TrackOrder(Request $request, $Order_Number){

   // Getting Order Row
   $order = Order::where('order_number', $Order_Number)->first();

   // Handle Check if order already exisit.
   if(!$order){

            $notification = array(
            'message' => 'Order Not Found',
            'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

   }else{

         // Collecting All Order Items
   $items = OrderItem::where('order_id', $order->id)->get();

   // Seo Setting
   $seo = Seo::where('id','1')->first();

   // Fetching User Whos made this order
   $user = User::where('id', $order->user_id)->first();

   // Dict, Seats' -> Array list To Store Our Items in single order
   $products = [];

   // Foreach->Fetching all items in the Order
   foreach ($items as $item){
      $product = Product::find($item->product_id);

      if($product){
         $products[] = $product;
      }
   }

   // Collect all info as one
   $infos = [
      'seo' => [
    'seo_meta_title' => $seo->meta_title,
    'seo_meta_website' => $seo->meta_website,
    'seo_meta_author' => $seo->meta_author,
    'seo_meta_email' => $seo->meta_email,
    'seo_meta_phone' => $seo->meta_phone,
    'seo_meta_address' => $seo->meta_address,
    'seo_meta_description' => $seo->meta_description,
    'seo_meta_keyword' => $seo->meta_keyword,

      ],

'user' => [
    'user_name' => $user->name,
    'user_email' => $user->email,
      ],

'order' => [
    'id' => $order->id,
    'order_number' => $order->order_number,
    'Invoice_ID' => $order->invoice_no,
    'UserID' => $order->user_id,
    'phone' => $order->phone,
    'Paid_Price' => $order->amount,
    'Payment_Type' => $order->payment_method,
    'Currency' => $order->currency,
    'Invoice_Code' => $order->transaction_id,
    'address' => $order->adress,
    'post_code' => $order->post_code,
    'send_to' => $order->send_as,
    'status' => $order->status,
    'created_at' => $order->created_at,
      ],
   ];

   return view('frontend.pages.confirmation', compact('items','products','infos'));


   }
}


public function TicketNew(){

   $info = null;

   return view('frontend.pages.ticket', compact('info'));
}

public function TicketView($Ticket_Number){

   $info = Contact::where('ticket_number', $Ticket_Number)->first();
  
   return view('frontend.pages.ticket', compact('info'));
}


public function TicketSubmit(Request $request){

   // Fetching currently auth user id,
   $id = Auth::user()->id;

   // Fetching User Whos made this order
   $user = User::where('id', $id)->first();

   
   $ticket_checker = Contact::where('user_id', $id)->where('status', 'unread')->exists();

   if($ticket_checker){
      // User cant re submit new ticket until being as read first from admin

      $notification = array(
            'message' => 'Your Old Ticket Already Under Review',
            'alert-type' => 'error'
        );

      return redirect()->back()->with($notification);
   }
   else{

         Contact::insert([
    'name' => $user->name,
    'user_id' => $user->id,
    'ticket_number' => Str::random(10),
    'email' => $user->email,
    'phone' => $user->phone,
    'subject' => $request->subject,
    'message' => $request->message,
    'status' => "unread",
    'created_at' => Carbon::now()
    ]);

      $notification = array(
            'message' => 'Ticket Submit, Successfully',
            'alert-type' => 'success'
        );

         return redirect()->back()->with($notification);
   }



} // End Method

}
