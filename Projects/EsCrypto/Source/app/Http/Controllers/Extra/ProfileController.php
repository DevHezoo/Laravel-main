<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// import user, Hashing
use App\Models\User;
use App\Models\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class ProfileController extends Controller
{

    public function UpdatePayout(Request $request)
    {

        if(session()->has('User') 
            && $request->input('payout-type') == 'faucetpay' 
            || $request->input('payout-type') == 'wallet'
            || $request->input('payout-type') == 'other')
        {
            $user = Auth::user();
            $user->update(['payout' => $request->input('payout-type')]);
            return redirect()->back()->with('success', 'Payout Operation Updated');
        }else{
            return redirect()->back()->with('error', 'something went wrong');
        }
       
    }

    // Password Update
    public function Password(Request $request){
        if(session()->has('User')) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);
            // Matching tge old Password
            if(!Hash::check($request->old_password, auth::user()->password)){
                return redirect()->back()->with('error', 'User Password');
            }else{
                User::whereId(Auth::user()->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return redirect()->back()->with('success', 'Password Updated');
            }
        }
    }

    // RequestPayout Update
    public function RequestPayout(Request $request){

        if(session()->has('User') && session('Seo')->wallet_min_withdraw <= session('User')->balance) 
        {
                $request->validate([
                    'payout_address' => 'required|string',
                    'payout_type' => 'required|string',
                ]);

                $mail = Auth::user()->email;
                $type = $request->payout_type;
                $address= $request->payout_address;
                $amount= Auth::user()->balance;
                $title= session('Seo')->meta_title;

                $id = Str::uuid();
                $createdAt = now()->format('Y-m-d H:i');

                $requestt = Requests::create([
                    'email' => $mail,
                    'type' => $type,
                    'address' => $address,
                    'balance' => $amount,
                    'identifier' => $id,
                ]);

                if($requestt){
                    User::whereId(Auth::user()->id)->update([
                        'balance' => '0.000000000000',
                    ]);
                }


                Mail::raw("Request Details\n
                    Request ID: $id\n                  
                    Requested by: $mail\n
                    Payout Operation: $type\n
                    Payout Address: $address\n
                    Payout Amount: $amount" . '$' . "\n
                    Payout Status: Pending\n
                    Request Date: $createdAt\n
                    More: Please use Contact Form, provide to us your request details [!Important]\n\n
Regards,\n$title Team.", function ($message) use ($mail, $title) {$message->to($mail)->subject('Request');
                });


                return redirect()->back()->with('success', 'Requested, Check Mail');
        }else{
                return redirect()->back()->with('error', 'something went wrong');
        }

    }

    // UpdateReferral Update
    // public function UpdateReferral(Request $request){

    //     if(session()->has('User')){

    //         $request->validate([
    //             'referral' => 'required|email',
    //         ]);

    //         $user = Auth::user();
    //         $referral = User::where('email', $request->referral)->first();

    //         if(!$referral){
    //                 return redirect()->back()->with('error', 'Email Not Found in DB');  
    //         }else{
    //         if ($request->referral !== $user->email) {
    //             User::whereId(Auth::user()->id)->update(['invited_by' => $request->referral,]);
    //             return redirect()->back()->with('success', 'Referral');
    //         }else{
    //             return redirect()->back()->with('warning', 'Invalid');
    //         }
    //         }
    //     } 
    // }


}