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
class PropertyControl extends Controller
{
    //
public function ViewAllProperties(){

     $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $properties = Property::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.property.all_properties',compact('properties','admin'));
}

    public function ViewProperty($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $property = Property::where('id', $ID)->first();
        $type = PropertyType::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.property.property',compact('property','admin','type'));

    } // End Mehtod 

    public function NewProperty(){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $counter = Property::count() + 1;

        $type = PropertyType::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.property.add',compact('counter','admin','type'));

    } // End Mehtod 



public function AddProperty(Request $request){

        // Create a new ticket record
        $Data = new Property;

        $Data->property_type = $request->type;
        $Data->property_title = $request->property_title;
        $Data->property_name = $request->property_name;
        $Data->property_slug = $request->property_slug;
        $Data->property_bedroom = $request->property_bedroom;
        $Data->property_bathroom = $request->property_bathroom;
        $Data->property_area = $request->property_area;

        $Data->property_floor = $request->property_floor;
        $Data->property_parking_status = $request->property_parking_status;
        $Data->property_parking_spots = $request->property_parking_spots;
        $Data->property_price = $request->property_price;
        $Data->property_status = $request->property_status;
        $Data->property_short_desc = $request->property_short_desc;
        $Data->property_long_desc = $request->property_long_desc;
        $Data->property_collapse1_que = $request->property_collapse1_que;
        $Data->property_collapse1_ans = $request->property_collapse1_ans;
        $Data->property_collapse2_que = $request->property_collapse2_que;
        $Data->property_collapse2_ans = $request->property_collapse2_ans;

        $Data->property_collapse3_que = $request->property_collapse3_que;
        $Data->property_collapse3_ans = $request->property_collapse3_ans;
        $Data->property_payment = $request->property_payment;
        $Data->property_qty = $request->property_qty;
        $Data->property_address = $request->property_address;

        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');

            //Remove old picture from db, also from file
            @unlink(public_path('frontend/' .$Data->property_thumbnail));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Moving the file to main folder /user_images
            // $file->move(public_path('frontend/user_images/' .$filename));
            $file->move(public_path('frontend/upload/property/thumbnail/'), $filename);

            // Passing the file path to the db
            $Data['property_thumbnail'] = "upload/property/thumbnail/".$filename;
        }

        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Property Added, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/properties')->with($notification);

         ///upload/property/thumbnail/property_1.jpg
    }

    public function EditProperty(Request $request, $ID){

        // Create a new ticket record
        $Data = Property::find($ID);

        $Data->property_type = $request->type;
        $Data->property_title = $request->property_title;
        $Data->property_name = $request->property_name;
        $Data->property_slug = $request->property_slug;
        $Data->property_bedroom = $request->property_bedroom;
        $Data->property_bathroom = $request->property_bathroom;
        $Data->property_area = $request->property_area;

        $Data->property_floor = $request->property_floor;
        $Data->property_parking_status = $request->property_parking_status;
        $Data->property_parking_spots = $request->property_parking_spots;
        $Data->property_price = $request->property_price;
        $Data->property_status = $request->property_status;
        $Data->property_short_desc = $request->property_short_desc;
        $Data->property_long_desc = $request->property_long_desc;
        $Data->property_collapse1_que = $request->property_collapse1_que;
        $Data->property_collapse1_ans = $request->property_collapse1_ans;
        $Data->property_collapse2_que = $request->property_collapse2_que;
        $Data->property_collapse2_ans = $request->property_collapse2_ans;

        $Data->property_collapse3_que = $request->property_collapse3_que;
        $Data->property_collapse3_ans = $request->property_collapse3_ans;
        $Data->property_payment = $request->property_payment;
        $Data->property_qty = $request->property_qty;
        $Data->property_address = $request->property_address;

        // Check if photo uploaded.
        if ($request->file('photo')){
            $file = $request->file('photo');

            //Remove old picture from db, also from file
            @unlink(public_path('frontend/' .$Data->property_thumbnail));

            $filename = date('YmdHi').$file->getClientOriginalName();

            // Moving the file to main folder /user_images
            // $file->move(public_path('frontend/user_images/' .$filename));
            $file->move(public_path('frontend/upload/property/thumbnail/'), $filename);

            // Passing the file path to the db
            $Data['property_thumbnail'] = "upload/property/thumbnail/".$filename;
        }

        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Property Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/properties')->with($notification);

         ///upload/property/thumbnail/property_1.jpg
    }





    public function DeleteProperty($ID){

         Property::findOrFail($ID)->delete();

         $notification = array(
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/view/properties')->with($notification); 

    } // End Mehtod 


}
