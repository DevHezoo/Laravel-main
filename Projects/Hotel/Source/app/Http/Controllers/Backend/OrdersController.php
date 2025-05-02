<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Order;
use DB;
use App\Models\Featured;
use App\Models\Seo;

use App\Mail\Order_Delete_Mail;
use App\Mail\Order_Add_Mail;
use App\Mail\Order_edit_Mail;

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;
class OrdersController extends Controller
{
    //

    public function ViewAllOrders(){

    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $orders = Order::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.orders.all_orders',compact('orders','admin'));
}

    public function ViewOrder($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $order = Order::where('id', $ID)->first();
        $properties = \App\Models\Property::all();

        return view('backend.admin.pages.orders.order',compact('admin','order','properties'));

    } // End Mehtod 

    public function NewOrder(){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();
        // $users = User::all();
        $users = User::where('role', 'user')->get();

        $counter = Order::count() + 1;

        $order = Order::orderBy('id', 'asc')->get();
        $properties = \App\Models\Property::all();

        return view('backend.admin.pages.orders.add',compact('counter','admin','order','properties','users'));

    } // End Mehtod 



public function AddOrder(Request $request){

    try {
        // Create a new order record
        $order = new Order;

        // Populate the order object with request data
        $order->Property_ID = $request->Property_ID;
        $order->Property_Invoice_ID = $request->Property_Invoice_ID;
        $order->UserID = $request->UserID;
        $order->Identity_Number = $request->Identity_Number;
        $order->Paid_Price = $request->Paid_Price;
        $order->Check_In = $request->Check_In;
        $order->Check_Out = $request->Check_Out;
        $order->Invoice_Code = $request->Invoice_Code;

        // Save the order to the database
        $order->save();

        // Retrieve related data
        $property = Property::find($request->Property_ID);
        $user = User::find($request->UserID);
        $seo = Seo::find(1); // Assuming SEO data is static

      


        Mail::to($user->email)->send(new Order_Add_Mail($data));


        $notification = array(
            'message' => 'Order Added, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/orders')->with($notification);
} catch (\Exception $e) {
\Log::error($e->getMessage());
        $notification = array(
            'message' => 'Session, Timeout',
            'alert-type' => 'error'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/orders')->with($notification);
 }
         ///upload/property/thumbnail/property_1.jpg
    }

    public function EditOrder(Request $request, $ID){

        // Create a new ticket record
        $Data = Order::find($ID);

        $Data->Property_ID = $request->Property_ID;
        $Data->Property_Invoice_ID = $request->Property_Invoice_ID;
        $Data->UserID = $request->UserID;
        $Data->Identity_Number = $request->Identity_Number;
        $Data->Paid_Price = $request->Paid_Price;
        $Data->Invoice_Code = $request->Invoice_Code;

        // Save the DB
        $Data->save();




        $order = Order::find($ID);
        $user = User::where('id', $order->UserID)->first();
        $booked = Order::count();
        $seo = Seo::where('id', '1')->first();  
        $property = Property::where('id', $order->Property_ID)->first();  

        $data = [

 'property' => [

    'property_id' => $property->id,
    'property_type' => $property->property_type,
    'property_slug' => $property->property_slug,
    'property_code' => $property->property_code,
    'property_price' => $property->property_price,
    'property_short_desc' => $property->property_short_desc,
    'property_thumbnail' => $property->property_thumbnail,
    'property_payment' => $property->property_payment,
        // Add other property data here
    ],
    'seo' => [
        
    'seo_meta_title' => $seo->meta_title,
    'seo_meta_website' => $seo->meta_website,
    'seo_meta_author' => $seo->meta_author,
    'seo_meta_email' => $seo->meta_email,
    'seo_meta_phone' => $seo->meta_phone,
    'seo_meta_address' => $seo->meta_address,
    'seo_meta_description' => $seo->meta_description,
    'seo_meta_keyword' => $seo->meta_keyword,
        // Add other SEO data here
    ],
    'user' => [
    'user_name' => $user->name,
    'user_email' => $user->email,
    'user_passport' => $user->passport,
    'user_phone' => $user->phone,
        // Add other user data here
    ],

    'count' => Order::count(),


    'order' => [
'id' => $order->id,
'Property_ID' => $order->Property_ID,
'Property_Invoice_ID' => $order->Property_Invoice_ID,
    'UserID' => $order->UserID,
    'Identity_Number' => $order->Identity_Number,
    'Paid_Price' => $order->Paid_Price,
    'Check_In' => $order->Check_In,
    'Check_Out' => $order->Check_Out,
    'Invoice_Code' => $order->Invoice_Code,
    'created_at' => $order->created_at,
    ], 
        ];


        Mail::to($user->email)->send(new Order_edit_Mail($data));



        $notification = array(
            'message' => 'Order Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/orders')->with($notification);

         ///upload/property/thumbnail/property_1.jpg
    }





    public function DeleteOrder($ID){
        
        $order = Order::find($ID);
        $user = User::where('id', $order->UserID)->first();
        $booked = Order::count() - 1;
        $seo = Seo::where('id', '1')->first();  
        $property = Property::where('id', $order->Property_ID)->first();  

         $notification = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => 'success'
        );

        $data = [


 'property' => [

    'property_id' => $property->id,
    'property_type' => $property->property_type,
    'property_slug' => $property->property_slug,
    'property_code' => $property->property_code,
    'property_price' => $property->property_price,
    'property_short_desc' => $property->property_short_desc,
    'property_thumbnail' => $property->property_thumbnail,
    'property_payment' => $property->property_payment,
        // Add other property data here
    ],
    'seo' => [
        
    'seo_meta_title' => $seo->meta_title,
    'seo_meta_website' => $seo->meta_website,
    'seo_meta_author' => $seo->meta_author,
    'seo_meta_email' => $seo->meta_email,
    'seo_meta_phone' => $seo->meta_phone,
    'seo_meta_address' => $seo->meta_address,
    'seo_meta_description' => $seo->meta_description,
    'seo_meta_keyword' => $seo->meta_keyword,
        // Add other SEO data here
    ],
    'user' => [
    'user_name' => $user->name,
    'user_email' => $user->email,
    'user_passport' => $user->passport,
    'user_phone' => $user->phone,
        // Add other user data here
    ],

    'count' => Order::count(),


    'order' => [
'id' => $order->id,
'Property_ID' => $order->Property_ID,
'Property_Invoice_ID' => $order->Property_Invoice_ID,
    'UserID' => $order->UserID,
    'Identity_Number' => $order->Identity_Number,
    'Paid_Price' => $order->Paid_Price,
    'Check_In' => $order->Check_In,
    'Check_Out' => $order->Check_Out,
    'Invoice_Code' => $order->Invoice_Code,
    'created_at' => $order->created_at,
    ], 
        ];


        Mail::to($user->email)->send(new Order_Delete_Mail($data));

        Order::findOrFail($ID)->delete();

        return redirect('/admin/view/orders')->with($notification); 

    } // End Mehtod 


}
