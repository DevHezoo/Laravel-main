<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Featured;
use App\Models\Seo;
use App\Models\Order;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    //
    public function Home(){
        $types = PropertyType::orderBy('id', 'desc')->get();

        $Properties = Property::orderBy('id', 'desc')->get();

        return view('frontend.pages.properties',compact('types','Properties') );
    }


    public function PropertyPage(Request $request, $PropertyID){

        $property = Property::where('id', $PropertyID)->first();

        $left = Order::where('Property_ID', $PropertyID)->first();

        return view('frontend.pages.property', compact('property','left'));
    }


    public function OrderPage(Request $request, $PropertyID){

        // Check if the user is authenticated
        if (!Auth::check()) {
        // If not authenticated, redirect to the login page
        $notification = array(
            'message' => 'Login First',
            'alert-type' => 'info'
        );

        $url = '/login';

        return redirect()->intended($url)->with($notification);
        }


        $property = Property::where('id', $PropertyID)->first();
        $user = User::where('id', auth()->user()->id)->first();

        return view('frontend.pages.booking', compact('property','user'));

    }
    
    public function Order(Request $request){

        $token = $request->input('stripeToken');
        $booked = Order::count() + 1;



        $seo = Seo::where('id', '1')->first();
        $user = User::find(auth()->user()->id);
        $property = Property::where('id', $request->property_id)->first();

        \Stripe\Stripe::setApiKey($seo->meta_stripe_api);

        $charge = \Stripe\Charge::create([
          'amount' => $request->property_price * 100,
          'currency' => 'usd',
          'description' => 'Check in',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);


        $order_id = Order::insertGetId([
            'Property_ID' => $request->property_id,
            'Property_Invoice_ID' => 'Hotel_'.mt_rand(10000000,99999999),
            'UserID' => $request->user,
            'Identity_Number' => $request->Identity_Number,
            'Paid_Price' => $request->property_price,
            'Check_In' => $request->checkin,
            'Check_Out' => $request->checkout,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Invoice_Code' => substr($token, 4),
        ]);


        $passport = $user->update([
        'passport' => $request->Identity_Number,
        ]);
        // Start Send Email

        $invoice = Order::findOrFail($order_id);

        $data = [
            'order' => $booked,
            'payment_type' => ucfirst($request->property_payment),
            'invoice_no' => $invoice->Property_Invoice_ID,
            'created' => $invoice->created_at,

            'author' => $seo->meta_author,
            'address' => $seo->meta_address,
            'email' => $seo->meta_email,

            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'check_in' => $invoice->Check_In,
            'check_out' => $invoice->Check_Out,
            'Identity_Number' => $invoice->Identity_Number,

            'property_name' => Str::limit($request->property_name, 15, '..!'),
            'property_id' => $invoice->Property_ID,
           
            'description' => $property->property_short_desc,
            'price' => $invoice->Paid_Price,

            'payment_Token_Code' => $invoice->Invoice_Code,


            'title' => $seo->meta_title,
            'link' => $seo->meta_website,
            
        ];

        Mail::to($request->user_email)->send(new OrderMail($data));

        // End Send Email 


        $notification = array(
            'message' => 'Check Your Email, Successfully',
            'alert-type' => 'success'
        );
         return redirect()->intended('/')->with($notification);
        // return redirect()->route('home')->with($notification); 



    }// End Method 

}