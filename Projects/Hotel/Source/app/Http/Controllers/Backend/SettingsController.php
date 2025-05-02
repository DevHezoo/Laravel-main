<?php

namespace App\Http\Controllers\Backend;

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

class SettingsController extends Controller
{
    //

public function AdminSettings(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $seo = Seo::where('id', '1')->first();

    return view('backend.admin.pages.settings.settings',compact('admin','seo'));
} // End Mehtod 



    public function EditWebsite(Request $request){

        // Fetching user Data {Array list}
        $Data = Seo::where('id', '1')->first();

        $Data->meta_website = $request->meta_website;
        $Data->meta_title = $request->meta_title;
        $Data->meta_author = $request->meta_author;
        $Data->meta_keyword = $request->meta_keyword;
        $Data->meta_description = $request->meta_description;
        $Data->meta_email = $request->meta_email;
        $Data->meta_phone = $request->meta_phone;
        $Data->meta_address = $request->meta_address;
        $Data->meta_video = $request->meta_video;
        // $Data->meta_icon = $request->meta_icon;
        $Data->meta_stripe_api = $request->meta_stripe_api;
        $Data->meta_stripe_client = $request->meta_stripe_client;
        $Data->meta_map = $request->meta_map;
        $Data->meta_fb = $request->meta_fb;
        $Data->meta_tw = $request->meta_tw;
        $Data->meta_li = $request->meta_li;
        $Data->meta_in = $request->meta_in;

        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');

            //Remove old picture from db, also from file
            @unlink(public_path('frontend/upload/website/' .$Data->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Moving the file to main folder /user_images
            // $file->move(public_path('frontend/user_images/' .$filename));
            $file->move(public_path('frontend/upload/website/'), $filename);

            // Passing the file path to the db
            $Data['meta_icon'] = $filename;
        }

        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Website Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);
    }



}
