<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    //

    public function Contact(){


    if (Auth::check()) {
        $user = User::find(auth()->user()->id);
        return view('frontend.pages.contact', compact('user'));
    }

        $user = (object) ['name' => '','email' => ''];
        return view('frontend.pages.contact', compact('user'));
    
    }



public function SaveContact(Request $request)
{
    if (!Auth::check()) {
        // User is not authenticated
        $exists = Contact::where('email', $request->email)->where('status', 'unread')->first();

        
        if ($exists) {
            $notification = [
                'message' => 'Already under review',
                'alert-type' => 'error'
            ];

            // Redirect the user or show an error message
            return redirect('/')->with($notification);
        }

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'status' => 'required',
        ]);

        // Create a new contact record
        Contact::create($validatedData);

        $notification = [
            'message' => 'Your message has been sent successfully',
            'alert-type' => 'success'
        ];

        // Redirect the user or show a success message
        return redirect()->back()->with($notification);
    } else {
        // User is authenticated
        $user = Auth::user();

        // Check if the user has already submitted a ticket
        $existingTicketForUser = Contact::where('email', $user->email)->where('status', 'unread')->first();

        if ($existingTicketForUser) {
            $notification = [
                'message' => 'You have already submitted a ticket',
                'alert-type' => 'error'
            ];

            // Redirect the user or show an error message
            return redirect('/')->with($notification);
        }

        // Validate the form data
        $validatedData = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Create a new ticket record
        $ticket = new Contact;
        $ticket->name = $user->name; // Retrieve the user's name
        $ticket->email = $user->email; // Retrieve the user's email
        $ticket->subject = $validatedData['subject'];
        $ticket->message = $validatedData['message'];
        $ticket->status = 'unread';
        $ticket->save();

        $notification = [
            'message' => 'Dear ' . $user->role . ', your Ticket has been sent successfully',
            'alert-type' => 'success'
        ];

        // Redirect the user or show a success message
        return redirect('/')->with($notification);
    }
}




}
