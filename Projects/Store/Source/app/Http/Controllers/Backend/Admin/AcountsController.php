<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;

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
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/user_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/user_images/'), $filename);

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


    public function AddUser(Request $request){
    $user = new User;
    if($user){
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/user_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/user_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'User Added, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => "User Can't be Adding",
            'alert-type' => 'error'
        );

        return redirect('admin/view/users')->with($notification);
    }
    }
    public function NewUser(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.users.add_user', compact('admin'));
    }





    // Vendors
    public function AllVendors(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'vendor')->get();

    return view('backend.admin.pages.accounts.vendors.all_vendors', compact('users','admin'));
    }


    public function DeleteVendor($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Vendor Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Vendor Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    }

    public function ViewVendor($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.vendors.view_vendor', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'Vendor Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    }

    public function EditVendor(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/vendor_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/vendor_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Vendor Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Vendor Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    }

    public function EditVendorPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'Vendor Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Vendor Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    }


    public function AddVendor(Request $request){
    $user = new User;
    if($user){
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/vendor_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/vendor_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Vendor Added, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => "Vendor Can't be Adding",
            'alert-type' => 'error'
        );

        return redirect('admin/view/vendors')->with($notification);
    }
    }
    public function NewVendor(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.vendors.add_vendor', compact('admin'));
    }




    // Deliveries
    public function AllDeliveries(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $users = User::where('role', 'delivery')->get();

    return view('backend.admin.pages.accounts.deliveries.all_deliveries', compact('users','admin'));
    }


    public function DeleteDelivery($ID){

    $deletion = User::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Delivery Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Delivery Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    }

    public function ViewDelivery($ID){

    $user = User::findOrFail($ID);

    if($user){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        return view('backend.admin.pages.accounts.deliveries.view_delivery', compact('user','admin'));

    }
    else{
         $notification = array(
            'message' => 'Delivery Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    }

    public function EditDelivery(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/delivery_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/delivery_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Delivery Profile Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Delivery Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    }

    public function EditDeliveryPass(Request $request ,$ID){

    $user = User::findOrFail($ID);

    if($user){

        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->updated_at = Carbon::now();
        // Save the data to db
        $user->save();

        $notification = array(
            'message' => 'Delivery Password Updated, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Delivery Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    }


    public function AddDelivery(Request $request){
    $user = new User;
    if($user){
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/delivery_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/delivery_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Delivery Added, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => "Delivery Can't be Adding",
            'alert-type' => 'error'
        );

        return redirect('admin/view/deliveries')->with($notification);
    }
    }
    public function NewDelivery(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.deliveries.add_delivery', compact('admin'));
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
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/admin_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/admin_images/'), $filename);

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


    public function AddAdmin(Request $request){
    $user = new User;
    if($user){
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->vendor_short_info = $request->vendor_short_info;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        // Check if photo uploaded
        if($request->file('photo')){
            $file = $request->file('photo');

            // Remove old picture from db

            @unlink(public_path('/frontend/upload/admin_images/' .$user->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Move the file to /user_images
            $file->move(public_path('/frontend/upload/admin_images/'), $filename);

            // Passing the file path to the db
            $user['photo'] = $filename;
        }

        // Save the data to db

        $user->save();

        $notification = array(
            'message' => 'Admin Added, Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => "Admin Can't be Adding",
            'alert-type' => 'error'
        );

        return redirect('admin/view/admins')->with($notification);
    }
    }
    public function NewAdmin(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.accounts.admins.add_admin', compact('admin'));
    }


}
