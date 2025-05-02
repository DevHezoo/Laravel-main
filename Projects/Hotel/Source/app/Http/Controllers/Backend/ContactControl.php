<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Property;
use App\Models\Order;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ContactControl extends Controller
{
    //


    public function ViewAllContacts(){

        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $contacts = Contact::orderByRaw("CASE WHEN status = 'unread' THEN 0 ELSE 1 END")
    ->orderBy('created_at', 'asc')
    ->get();

        return view('backend.admin.pages.contacts.all_contacts',compact('contacts','admin'));

    } // End Mehtod 

    public function ViewContact($ID){
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();

        $contacts = Contact::where('id', $ID)->first();

        $contacts->status = 'read';
        $contacts->save();

        return view('backend.admin.pages.contacts.contact',compact('contacts','admin'));

    } // End Mehtod 

    public function DeleteContact($ID){

         Contact::findOrFail($ID)->delete();

         $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/view/contacts')->with($notification); 

    } // End Mehtod 


    public function DeleteContacts(){

         Contact::truncate();

         $notification = array(
            'message' => 'Messages Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/view/contacts')->with($notification); 

    } // End Mehtod 


}
