<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// import user, Hashing
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Password Update
    public function Password(Request $request){
        // Validation Old Password, with new Password

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Matching tge old Password
        if(!Hash::check($request->old_password, auth::user()->password)){

        toastr()->error('User Password Not Correctly!', 'Update!');

        return redirect()->back();

        }else{

    
        User::whereId(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);


        toastr()->success('Password Updated Successfully!', 'Update!');

        return redirect()->back();

        }

    }




    public function Information(Request $request){

        // Fetching currently auth user id,
        $id = Auth::user()->id;
        // Fetching user Data {Array list}
        $Data = User::find($id);

        $type = null;

switch ($Data->role) {
    case 'user':
        $type = 'user_imgs';
        break;
    case 'premium':
        $type = 'premium_imgs';
        break;
    case 'expert':
        $type = 'expert_imgs';
        break;
    case 'admin':
        $type = 'admin_imgs';
        break;
    default:
        // Handle other cases if necessary
        break;
}

        // Set Db from Form Inbuts (name,social_link....etc)
        $Data->phone = $request->phone;
        $Data->address = $request->address;
        $Data->social_link = $request->social_link;


        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');

            //Remove old picture from db, also from file
            @unlink(public_path('frontend/upload/' . $type . '/' . $Data->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Moving the file to main folder /user_images
            // $file->move(public_path('frontend/user_images/' .$filename));
            $file->move(public_path('frontend/upload/' . $type . '/'), $filename);


            // Passing the file path to the db
            $Data['photo'] = 'frontend/upload/' . $type . '/' . $filename;
        }


        // Save the DB
        $Data->save();

        toastr()->success('User Profile Updated!', 'Update!');

        return redirect()->back();

    }



}
