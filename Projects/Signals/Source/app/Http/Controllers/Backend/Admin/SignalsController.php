<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Seo;
use App\Models\Signals;
use App\Models\Comments_Signals;

use Illuminate\Database\QueryException;
use Carbon\Carbon;

class SignalsController extends Controller
{
    //

    public function ViewAllGuestsSignals(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $seo = Seo::where('id', '1')->first();

    // Find all Signals
        $signals = Signals::orderBy('created_at', 'desc')
    ->whereIn('signal_type', [1])
    ->get();

    return view('backend.admin.pages.signals.guests.all_guests',compact('admin','seo','signals'));
    } // End Mehtod 


    public function NewGuestSignal(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.signals.guests.add_guest', compact('admin'));
    }

    public function AddGuestSignal(Request $request)
{
    try {

        $signal = new Signals;

        if ($signal) {
            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->created_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

            // Save the data to db
            $signal->save();

            $notification = [
                'message' => 'Guest Signal Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('view.guests.signals')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'already exists. Please choose a different Signal.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Signal couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('view.guests.signals')->with($notification);
    }

    $notification = [
        'message' => "Signal Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/signals_guest')->with($notification);
}

    public function ViewGuestSignal($ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    // Find Signal
    $signal = Signals::where('id', $ID)->first();
    $comments = Comments_Signals::where('signal_id', $ID)->get();

    return view('backend.admin.pages.signals.guests.view_guest', compact('admin','signal','comments'));
    }


    public function EditGuestSignal(Request $request , $ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();


$signal = Signals::findOrFail($ID);

    if($signal){

            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->updated_at = Carbon::now();


            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

        // Save the data to db

        // Save the data to db
        $signal->save();

        $notification = [
            'message' => 'Guest Signal Updated, Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Guest Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_guest')->with($notification);
    }

    }


    public function DeleteGuestSignal($ID){

    $deletion = Signals::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Premium Signal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/signals_guest')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Guest Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_guest')->with($notification);
    }
    }

    public function DeleteSignalComment($ID){

        $deletion = Comments_Signals::findOrFail($ID)->delete();
            
        if($deletion){
        $notification = array(
            'message' => 'Comment Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Comment Not Found',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    }

  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //

public function ViewAllPremiumsSignals(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $seo = Seo::where('id', '1')->first();

    // Find all Signals [1, 2, 3]
    $signals = Signals::orderBy('created_at', 'desc')
    ->whereIn('signal_type', [3])
    ->get();


    return view('backend.admin.pages.signals.premiums.all_premiums',compact('admin','seo','signals'));
    } // End Mehtod 


    public function NewPremiumSignal(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.signals.premiums.add_premium', compact('admin'));
    }

    public function AddPremiumSignal(Request $request)
{
    try {

        $signal = new Signals;

        if ($signal) {
            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->created_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

            // Save the data to db
            $signal->save();

            $notification = [
                'message' => 'Premium Signal Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('view.premiums.signals')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'already exists. Please choose a different Signal.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Signal couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('view.premiums.signals')->with($notification);
    }

    $notification = [
        'message' => "Signal Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/signals_premium')->with($notification);
}

    public function ViewPremiumSignal($ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    // Find Signal
    $signal = Signals::where('id', $ID)->first();
    $comments = Comments_Signals::where('signal_id', $ID)->get();

    return view('backend.admin.pages.signals.premiums.view_premium', compact('admin','signal','comments'));
    }


    public function EditPremiumSignal(Request $request , $ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();


$signal = Signals::findOrFail($ID);

    if($signal){

            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->updated_at = Carbon::now();


            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

        // Save the data to db

        // Save the data to db
        $signal->save();

        $notification = [
            'message' => 'Premium Signal Updated, Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Premium Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_premium')->with($notification);
    }

    }


    public function DeletePremiumSignal($ID){

    $deletion = Signals::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Premium Signal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/signals_premium')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Premium Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_premium')->with($notification);
    }
    }

 //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //

public function ViewAllUsersSignals(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $seo = Seo::where('id', '1')->first();

    // Find all Signals [1, 2]
    $signals = Signals::orderBy('created_at', 'desc')
    ->whereIn('signal_type', [2])
    ->get();


    return view('backend.admin.pages.signals.users.all_users',compact('admin','seo','signals'));
    } // End Mehtod 


    public function NewUserSignal(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.signals.users.add_user', compact('admin'));
    }

    public function AddUserSignal(Request $request)
{
    try {

        $signal = new Signals;

        if ($signal) {
            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->created_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

            // Save the data to db
            $signal->save();

            $notification = [
                'message' => 'User Signal Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('view.users.signals')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'already exists. Please choose a different Signal.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Signal couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('view.users.signals')->with($notification);
    }

    $notification = [
        'message' => "Signal Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/signals_user')->with($notification);
}

    public function ViewUserSignal($ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    // Find Signal
    $signal = Signals::where('id', $ID)->first();
    $comments = Comments_Signals::where('signal_id', $ID)->get();

    return view('backend.admin.pages.signals.users.view_user', compact('admin','signal','comments'));
    }


    public function EditUserSignal(Request $request , $ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();


$signal = Signals::findOrFail($ID);

    if($signal){

            $signal->name = $request->name;
            $signal->date = $request->date;
            $signal->status = $request->status;
            $signal->type = $request->type;
            $signal->open_price = $request->open_price;
            $signal->take_profit_1 = $request->profit_1;
            $signal->take_profit_2 = $request->profit_2;
            $signal->take_profit_3 = $request->profit_3;
            $signal->stop_loss = $request->stop_loss;
            $signal->profit_loss = $request->profit_loss;
            $signal->trade_result = $request->trade_result;
            $signal->trade_probability = $request->trade_probability;
            $signal->time_frame = $request->time_frame;
            $signal->last_update_time = $request->last_update_time;
            $signal->comment = $request->comment;

            $signal->long_desc = $request->long_description;
            $signal->signal_type = $request->signal_type;
            $signal->author_id = $request->author_id;
            $signal->updated_at = Carbon::now();


            // Check if photo uploaded
            if ($request->file('photo_1')) {
                $file = $request->file('photo_1');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_1));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_1 = "frontend/upload/signal/" . $filename;
            }

            // Check if photo uploaded
            if ($request->file('photo_2')) {
                $file = $request->file('photo_2');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/signal/' . $signal->img_2));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/signal/'), $filename);

                // Passing the file path to the db
                $signal->img_2 = "frontend/upload/signal/" . $filename;
            }

        // Save the data to db

        // Save the data to db
        $signal->save();

        $notification = [
            'message' => 'User Signal Updated, Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'User Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_user')->with($notification);
    }

    }


    public function DeleteUserSignal($ID){

    $deletion = Signals::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'User Signal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/signals_user')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'User Signal Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/signals_user')->with($notification);
    }
    }

}
