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

class AdminController extends Controller
{
    //


public function AdminLogin(){
    return view('backend.admin.login');
}

    public function AdminDashboard(){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();
        return view('backend.admin.pages.main.dashboard',compact('admin'));
    } // End Mehtod 
    
    public function ViewAllUsers(){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

    $users = User::where('role', 'user')->orderBy('last_seen', 'desc')
    ->get();

        return view('backend.admin.pages.users.all_users',compact('users','admin'));

    } // End Mehtod 

    public function ViewUser($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $user = User::where('id', $ID)->first();
        return view('backend.admin.pages.users.user',compact('user','admin'));

    } // End Mehtod 


    public function EditUser(Request $request, $ID){

        // Fetching user Data {Array list}
        $Data = User::find($ID);

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





    public function UserPass(Request $request, $ID){
        // Validation Old Password, with new Password

        // Fetching user Data {Array list}
        $Data = User::find($ID);

        // $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required',
        //     'password_confirmation' => 'required',
        // ]);

        // Matching tge old Password
        // if(!Hash::check($request->current_password, $Data->password)){

        //     // They are the same, now we can update the new password, with hashing it.
        //     // Update The new Password


        // $notification = array(
        //     'message' => 'User Password Not Correctly, Error',
        //     'alert-type' => 'error'
        // );

        // // return redirect()->intended(RouteServiceProvider::HOME);
        //  return redirect()->back()->with($notification);

        // }else{

    
            User::whereId($Data->id)->update([
                'password' => Hash::make($request->password)
            ]);

        $notification = array(
            'message' => 'User Password Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);


        // }

    }


    public function DeleteUser($ID){

         User::findOrFail($ID)->delete();

         $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/users')->with($notification); 

    } // End Mehtod 

           

////////////////////////////////////// ////////////////////////////////
         /////////////////////////////






    public function ViewAllAdmins(){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

    $users = User::where('role', 'admin')->orderBy('last_seen', 'desc')
    ->get();

        return view('backend.admin.pages.admins.all_admins',compact('users','admin'));

    } // End Mehtod 

    public function ViewAdmin($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $user = User::where('id', $ID)->first();
        return view('backend.admin.pages.admins.admin',compact('user','admin'));

    } // End Mehtod 


    public function EditAdmin(Request $request, $ID){

        // Fetching user Data {Array list}
        $Data = User::find($ID);

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





    public function AdminPass(Request $request, $ID){
        // Validation Old Password, with new Password

        // Fetching user Data {Array list}
        $Data = User::find($ID);

        // $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required',
        //     'password_confirmation' => 'required',
        // ]);

        // Matching tge old Password
        // if(!Hash::check($request->current_password, $Data->password)){

            // They are the same, now we can update the new password, with hashing it.
            // Update The new Password


        // $notification = array(
        //     'message' => 'Admin Password Not Correctly, Error',
        //     'alert-type' => 'error'
        // );

        // return redirect()->intended(RouteServiceProvider::HOME);
        //  return redirect()->back()->with($notification);

        // }else{

    
            User::whereId($Data->id)->update([
                'password' => Hash::make($request->password)
            ]);

        $notification = array(
            'message' => 'User Password Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->back()->with($notification);


        // }

    }


    public function DeleteAdmin($ID){

         User::findOrFail($ID)->delete();

         $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/admins')->with($notification); 

    } // End Mehtod 



}
