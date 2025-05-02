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

class TypesController extends Controller
{
    //


public function ViewAllTypes(){

     $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $types = PropertyType::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.types.all_types',compact('types','admin'));
}

    public function ViewType($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $type = PropertyType::where('id', $ID)->first();

        return view('backend.admin.pages.types.type',compact('admin','type'));

    } // End Mehtod 

    public function NewType(){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $counter = PropertyType::count() + 1;

        $type = PropertyType::orderBy('id', 'asc')->get();

        return view('backend.admin.pages.types.add',compact('counter','admin','type'));

    } // End Mehtod 



public function AddType(Request $request){

        // Create a new ticket record
        $Data = new PropertyType;

        $Data->property_type = $request->property_type;
        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Type Added, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/types')->with($notification);

         ///upload/property/thumbnail/property_1.jpg
    }

    public function EditType(Request $request, $ID){

        // Create a new ticket record
        $Data = PropertyType::find($ID);

        $Data->property_type = $request->property_type;
        // Save the DB
        $Data->save();

        $notification = array(
            'message' => 'Type Updated, Successfully',
            'alert-type' => 'success'
        );

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect('/admin/view/types')->with($notification);

         ///upload/property/thumbnail/property_1.jpg
    }





    public function DeleteType($ID){

         PropertyType::findOrFail($ID)->delete();

         $notification = array(
            'message' => 'Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/view/types')->with($notification); 

    } // End Mehtod 

}
