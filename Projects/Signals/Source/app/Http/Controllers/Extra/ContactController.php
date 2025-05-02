<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContactController extends Controller
{
    //

public function Contact(Request $request){

   // Fetching currently auth user id,



   $name = null;
   $email = null;
   $phone = null;
   $user = null;
   $id = null;

    if(auth()->check()) {
        $id = Auth::user()->id;
        $user = User::find($id);
        $name = $user->name;
        $email = $user->email;
        $phone = $user->phone;
    }else{
        
        $id = $request->ip();
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
    }


    $ticket_checker = Contact::where('user_id', $id)->where('status', 'unread')->exists();

   if($ticket_checker){
      // User cant re submit new ticket until being as read first from admin

      toastr()->error('Your Old Message Already Under Review!', 'Error!');

      return redirect()->back();
   }
   else{

    Contact::insert([
    'name' => $name,
    'user_id' => $id,
    'ticket_number' => Str::random(10),
    'email' => $email,
    'phone' => $phone,
    'subject' => $request->subject,
    'message' => $request->message,
    'status' => "unread",
    'created_at' => Carbon::now()
    ]);

    toastr()->success('Message Submit, Successfully!', 'Ticket!');
    return redirect()->back();
   }

} // End Method


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
