<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Property;
use App\Models\Order;

use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    //

    public function ProfileAdmin(){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();
        return view('backend.admin.pages.profile.admin',compact('admin'));
    } // End Mehtod 

    public function EditAdmin(Request $request){

        // Fetching user Data {Array list}
        $Data = User::find(Auth::user()->id);

        $Data->name = $request->name;
        $Data->username = $request->username;
        $Data->email = $request->email;
        $Data->passport = $request->identity;
        $Data->phone = $request->phone;
        $Data->role = $request->role;
        $Data->status = $request->status;

        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');

            //Remove old picture from db, also from file
            @unlink(public_path('frontend/upload/admin_images/' .$Data->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Moving the file to main folder /user_images
            // $file->move(public_path('frontend/user_images/' .$filename));
            $file->move(public_path('frontend/upload/admin_images/'), $filename);

            // Passing the file path to the db
            $Data['photo'] = $filename;
        }

        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Admin Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);
    }





    public function AdminPass(Request $request){
        // Validation Old Password, with new Password

        // Fetching user Data {Array list}
        $Data = User::find(Auth::user()->id);

        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        // Matching tge old Password
        if(!Hash::check($request->current_password, $Data->password)){

            // They are the same, now we can update the new password, with hashing it.
            // Update The new Password


        $notification = array(
            'message' => 'Admin Password Not Correctly, Error',
            'alert-type' => 'error'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);

        }else{

    
            User::whereId($Data->id)->update([
                'password' => Hash::make($request->password)
            ]);

        $notification = array(
            'message' => 'Admin Password Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);


        }

    }


    public function DeleteAdmin(){

         User::findOrFail(Auth::user()->id)->delete();

         $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/admins')->with($notification); 

    } // End Mehtod 


}
