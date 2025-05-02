<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Database\QueryException;

class AcountsController extends Controller
{
    // Users
    public function AllUsers(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'user')->get();

    return view('backend.admin.pages.accounts.users.all_users', compact('users','admin'));
    }


    public function DeleteUser($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/users')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'User Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/users')->with($notification);
    }
    }

    public function ViewUser($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.users.view_user', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'User Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/users')->with($notification);
    }
    }

    public function EditUser(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->expert_short_info = $request->user_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/user_imgs/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/user_imgs/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'User Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'User Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/users')->with($notification);
    }
    }

    public function EditUserPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'User Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'User Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/users')->with($notification);
    }
    }


public function AddUser(Request $request)
{
    try {
        $user = new User;
        if ($user) {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->expert_short_info = $request->user_short_info;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->updated_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/user_imgs/' . $user->photo));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/user_imgs/'), $filename);

                // Passing the file path to the db
                $user->photo = $filename;
            }

            // Save the data to db
            $user->save();

            $notification = [
                'message' => 'User Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('admin.view.users')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'Email already exists. Please choose a different email.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "User couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('admin.view.users')->with($notification);
    }

    $notification = [
        'message' => "User Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/users')->with($notification);
}


    public function NewUser(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.users.add_user', compact('admin'));
    }




    // Premiums
    public function AllPremiums(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'premium')->get();

    return view('backend.admin.pages.accounts.premiums.all_premiums', compact('users','admin'));
    }


    public function DeletePremium($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Premium Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/premiums')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Premium Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/premiums')->with($notification);
    }
    }

    public function ViewPremium($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.premiums.view_premium', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'Premium Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/premiums')->with($notification);
    }
    }

    public function EditPremium(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->expert_short_info = $request->expert_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/premium_imgs/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/premium_imgs/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Premium Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Premium Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/premiums')->with($notification);
    }
    }

    public function EditPremiumPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'Premium Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Premium Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/premiums')->with($notification);
    }
    }


public function AddPremium(Request $request)
{
    try {
        $user = new User;
        if ($user) {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->expert_short_info = $request->premium_short_info;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->updated_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/premium_imgs/' . $user->photo));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /premium_images
                $file->move(public_path('/frontend/upload/premium_imgs/'), $filename);

                // Passing the file path to the db
                $user->photo = $filename;
            }

            // Save the data to db
            $user->save();

            $notification = [
                'message' => 'Premium Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('admin.view.premiums')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'Email already exists. Please choose a different email.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Premium couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('admin.view.premiums')->with($notification);
    }

    $notification = [
        'message' => "Premium Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/premiums')->with($notification);
}


    public function NewPremium(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.premiums.add_premium', compact('admin'));
    }




    // Experts
    public function AllExperts(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'expert')->get();

    return view('backend.admin.pages.accounts.experts.all_experts', compact('users','admin'));
    }


    public function DeleteExpert($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Expert Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/experts')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Expert Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/experts')->with($notification);
    }
    }

    public function ViewExpert($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.experts.view_expert', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'Expert Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/experts')->with($notification);
    }
    }

    public function EditExpert(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->expert_short_info = $request->expert_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/expert_imgs/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/expert_imgs/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Expert Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Expert Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/experts')->with($notification);
    }
    }

    public function EditExpertPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'Expert Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Expert Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/experts')->with($notification);
    }
    }


public function AddExpert(Request $request)
{
    try {
        $user = new User;
        if ($user) {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->expert_short_info = $request->expert_short_info;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->updated_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/expert_imgs/' . $user->photo));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /expert_images
                $file->move(public_path('/frontend/upload/expert_imgs/'), $filename);

                // Passing the file path to the db
                $user->photo = $filename;
            }

            // Save the data to db
            $user->save();

            $notification = [
                'message' => 'Expert Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('admin.view.experts')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'Email already exists. Please choose a different email.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Expert couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('admin.view.experts')->with($notification);
    }

    $notification = [
        'message' => "Expert Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/experts')->with($notification);
}

    public function NewExpert(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.experts.add_expert', compact('admin'));
    }



    // Admins
    public function AllAdmins(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'admin')->get();

    return view('backend.admin.pages.accounts.admins.all_admins', compact('users','admin'));
    }


    public function DeleteAdmin($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Admin Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    }

    public function ViewAdmin($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.admins.view_admin', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'Admin Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    }

    public function EditAdmin(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->expert_short_info = $request->admin_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/admin_imgs/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/admin_imgs/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Admin Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Admin Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    }

    public function EditAdminPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'Admin Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Admin Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    }


public function AddAdmin(Request $request)
{
    try {
        $user = new User;
        if ($user) {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->expert_short_info = $request->admin_short_info;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->updated_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/admin_imgs/' . $user->photo));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /admin_images
                $file->move(public_path('/frontend/upload/admin_imgs/'), $filename);

                // Passing the file path to the db
                $user->photo = $filename;
            }

            // Save the data to db
            $user->save();

            $notification = [
                'message' => 'Admin Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('admin.view.admins')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'Email already exists. Please choose a different email.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Admin couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('admin.view.admins')->with($notification);
    }

    $notification = [
        'message' => "Admin Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/admins')->with($notification);
}

    public function NewAdmin(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.admins.add_admin', compact('admin'));
    }


}
