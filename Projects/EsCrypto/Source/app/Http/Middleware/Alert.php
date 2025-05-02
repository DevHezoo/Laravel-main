<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Alert
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            
            $result = DB::table('users')
                ->where('email', auth()->user()->email)
                ->first();  

// 
            $Multi_Acc = DB::table('users')
                ->where('telegram_id', '!=', '') 
                ->where('email', auth()->user()->email)
                ->select('telegram_id')
                ->first();

            if($Multi_Acc){
                $telegram_id = $Multi_Acc->telegram_id;

                $otherAccounts = DB::table('users')
                    ->where('email', '!=', session('User')->email) // Exclude the current user
                    ->where('telegram_id', $telegram_id)
                    ->get();
                
            }
// 

            $email = session('User')->email;

            if ($result->mercy_left <= 0) {
                session(['MultiAccount' => 'yes']);
                auth()->logout(); // Logout the user

                Mail::raw('You are blocked for 24 hours for violating our terms', function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Violation');
                });

                return redirect()->back()->with('error', 'You are blocked for 24 hours for violating our terms.');
            }elseif(session('Data')['proxy'] === 'yes'){
                
            DB::table('users')
                ->where('id', auth()->id())
                ->update([
                    'mercy_left' => DB::raw('mercy_left - 1'),
                    'balance' => '0.000000000000',
                ]);

            session(['Mercy' => DB::table('users')->where('id', auth()->id())->value('mercy_left')]);


            // return response()->view('frontend.pages.pages.alert');

            }elseif($Multi_Acc && count($otherAccounts) > 0){

                session(['MultiAccount' => 'yes']);

                DB::table('users')
                    ->where('id', auth()->id())
                    ->update([
                    'status' => 'FALSE',
                    'telegram_id' => '',
                    'mercy_left' => '0',
                    'balance' => '0.000000000000',
                ]);

                session(['Mercy' => DB::table('users')->where('id', auth()->id())->value('mercy_left')]);


            // return response()->view('frontend.pages.pages.alert');


            }else{
                session(['MultiAccount' => 'no']);
            }


        }

        // session(['Access' => 'Yes']);
        return $next($request);
    }
}
