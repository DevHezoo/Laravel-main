<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Featured;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Seo;
use App\Models\Order;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;
class ProfileController extends Controller
{
    //


    public function Profile(){

        $user = User::find(auth()->user()->id);
        $order = Order::where('UserID', $user->id)->get();

        return view('frontend.pages.profile', compact('user','order'));
    }

    public function InvoiceInfo(Request $request, $InvoiceID){


        $order = Order::where('Property_Invoice_ID', $InvoiceID)->first();
        $property = Property::where('id', $order->Property_ID)->first();
        $seo = Seo::where('id', '1')->first();
        $user = User::find(auth()->user()->id);

        

        // Create an array to hold additional data
        $infos = [

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

        // Pass the $additionalData array to the view along with $order
    return view('frontend.body.invoice', compact('infos'));

    }




        public function UserInfo(Request $request){

        // Fetching currently auth user id,
        $id = Auth::user()->id;

        // Fetching user Data {Array list}
        $Data = User::find($id);
        // Set Db from Form Inbuts (name,social_link....etc)

        if (!empty($request->fullPhone)) {
            $Data->phone = $request->fullPhone;
        }

        $Data->passport = $request->number;
        $Data->name = $request->name;
        
        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');
            Log::info('Uploaded file contents:', ['file' => $file]);
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




}
