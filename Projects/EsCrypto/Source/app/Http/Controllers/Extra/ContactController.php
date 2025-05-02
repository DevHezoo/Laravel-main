<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Config;

class ContactController extends Controller
{
    //

public function Contact(Request $request){

    $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    $telegram_api = Config::get('api.telegram');
    $chat = Config::get('api.telegram_user');


    $message = "New message from Escrypto"."\n\n";
    $message .= "From: " .$request->email."\n";
    $message .= "Subject: " .$request->subject."\n";
    $message .= "Message: ".$request->message;


    $telegramURL = "https://api.telegram.org/bot$telegram_api/sendMessage";

    $curl = curl_init($telegramURL);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, [
    'chat_id' => $chat,
    'text' => $message,
    ]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);

    if (curl_errno($curl)) {
    return redirect()->back()->with('error', 'cURL Error: ' . curl_error($curl));
    }

    if ($result && $result['ok'] && isset($result['result']['message_id'])) {
        return redirect()->intended('/')->with('success', ' Msg has been sent Ticket #' .$result['result']['message_id']);
    } else {
        return redirect()->intended('/')->with('error', 'Something Went Wrong');
    }




} // End Method

   
}
