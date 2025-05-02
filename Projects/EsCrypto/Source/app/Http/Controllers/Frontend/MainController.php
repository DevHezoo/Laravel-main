<?php

namespace App\Http\Controllers\Frontend;

use Cookie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mahtab2003\FaucetPay\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use App\Models\Seo;
use App\Models\Shortlink;
use App\Models\ShortlinkTask;
use App\Models\Links;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    // Home Page.
    public function home(Request $request)
    {
        $payments = Payment::with('user')->orderBy('created_at', 'desc')->take(20)->get();
        $user = auth()->user();
        $users = User::count();

        // Pass translations to the view
        return view('frontend.main.dashboard', compact('user', 'payments', 'users'));
    }

    public function changeLanguage($locale, Request $request)
    {
        setcookie('Language', $locale, time() + 3600, '/');
        // Set the language in a cookie

        return response('Language updated');
    }

    function removeLeadingZerosAndDecimal($value) {
        $stringValue = preg_replace('/^0\.?0*/', '', strval($value));
        return intval($stringValue);
    }


// Faucet Send.
    public function FaucetSend(Request $request)
    {


    if(auth()->check() && session('Access') !== 'No'){

            $Last_Claimed = DB::table('payments')
                ->latest('created_at')
                ->where('email', session('User')->email)
                ->where('type', strtoupper(session('PageUnit')))
                ->first();

            if ($Last_Claimed) {
                $Last_Claimed = $Last_Claimed->created_at;
            } else {
                $Last_Claimed = now()->subYear()->format('Y-m-d H:i:s');
            }

            if (now()->diffInSeconds($Last_Claimed) < session('TimeLeft')) {
                abort(500);
            }

            $amount = session('FaucetCryptoAmount');
            $unit = session('PageUnit');
            $balance = session('Balance');
            $claimed_unit = session('FaucetCryptoAmount');
            $claimed_usd = session('FaucetUsdAmount');
            $referral_bonus = session('ReferralBonus');

            if (session('User')->payout === 'faucetpay') {

                    $api = new Api(Config::get('api.faucetpay'), $unit);
                    $result = $api->send(session('User')->email, $this->removeLeadingZerosAndDecimal(session('FaucetCryptoAmount')));

                    if ($result->isSuccessful()) {
                        $data = $result->getData();

                    $payment = DB::table('payments')->insert([
                        'email' => session('User')->email,
                        'amount' => $amount,
                        'type' => $unit,
                        'from' => 'Faucet',
                        'paid' => $claimed_usd,
                        'operation' => ucfirst(session('User')->payout),
                        'created_at' => Carbon::now(),
                    ]);

                    if (session('User')->invited_by !== null) {

                            DB::table('users')
                                ->where('email', session('User')->invited_by)
                                ->update([
                                    'balance' => DB::raw('balance + ' . ($claimed_usd * $referral_bonus / 100)),
                                ]);
                    }

                    DB::table('users')
                        ->where('id', session('User')->id) // Assuming 'id' is the primary key
                        ->update([
                            'total_faucet' => DB::raw('total_faucet + 1'),
                        ]);

                    if ($payment) {

                        DB::table('seos') // Replace 'your_table_name' with the actual table name
                        ->where('id', 1) // Assuming 'id' is the primary key
                        ->update([
                            'total_paid' => DB::raw('total_paid + ' . $claimed_usd),
                        ]);

                    return redirect()->back()->with('success', $amount .' ' . $unit . ' has been sent to your FaucetPay account!');
                    }

                } else {

                if (strpos($result->getMessage(), "The faucet does not have sufficient funds") !== false) {
                    return redirect()->back()->with('warning', $result->getMessage());
                } else {
                    return redirect()->back()->with('error', $result->getMessage());
                }

                }

        }elseif (session('User')->payout === 'wallet' || session('User')->payout === 'other') {


                    if($balance <= '0.00000010'){

                        return redirect()->back()->with('warning', 'The faucet does not have sufficient funds');

                    }else{

                    $payment = DB::table('payments')->insert([
                        'email' => session('User')->email,
                        'amount' => $amount,
                        'type' => $unit,
                        'from' => 'Faucet',
                        'paid' => $claimed_usd,
                        'operation' => ucfirst(session('User')->payout),
                        'created_at' => Carbon::now(),
                    ]);


                    if (session('User')->invited_by !== null) {

                            DB::table('users')
                                ->where('email', session('User')->invited_by)
                                ->update([
                                    'balance' => DB::raw('balance + ' . ($claimed_usd * $referral_bonus / 100)),
                                ]);
                    }

                    if ($payment) {

                    DB::table('users')
                        ->where('id', session('User')->id) // Assuming 'id' is the primary key
                        ->update([
                            'balance' => DB::raw('balance + ' . $claimed_usd),
                            'total_faucet' => DB::raw('total_faucet + 1'),
                        ]);

                    DB::table('seos') // Replace 'your_table_name' with the actual table name
                        ->where('id', 1) // Assuming 'id' is the primary key
                        ->update([
                            'total_paid' => DB::raw('total_paid + ' . $claimed_usd),
                        ]);
                    return redirect()->back()->with('success', $claimed_usd . '$' . ' has been added to your account!');

                    }else{
                        return redirect()->back()->with('error', 'something went wrong.!');
                    }}}

    }else
    {
        session(['Access' => 'Yes']);
        return redirect()->back()->with('error', 'something went wrong.!');
        
    }
}


// ClaimBonus.
public function ClaimBonus(Request $request)
{
    if (auth()->check() &&
        session('FaucetClaimed') >= session('FaucetLimit') &&
        session('TodayVisited') >= session('TotalShortlink') &&
        !Carbon::parse(session('User')->claimed)->isToday()&& 
        session('Access') !== 'No'
        ){

            $balanceUpdated = session('User')->update([
                'balance' => session('User')->balance + session('Seo')->shortlink_usd,
                'claimed' => now(),
            ]);

            if ($balanceUpdated) {
                return redirect()->back()->with('success', session('Seo')->shortlink_usd . '$' . ' has been added to your account!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
    }else{
            session(['Access' => 'Yes']);
            return redirect()->back()->with('error', 'something went wrong.!');
    }
}

public function ShortlinkTaskPage(Request $request, $Crypto, $ID)
{
    if (auth()->check()) {
        session(['ShortlinkIndex' => $ID]);

        // Extract values from the links field
        $links = explode(',', trim(session('User')->links, '()'));

        // Validate if $ID is within the array bounds
        if ($ID >= 1 && $ID <= count($links)) {
            // Assuming you want to fetch the value corresponding to the $ID
            $shortlinkId = $links[$ID - 1];

            if (!$shortlinkId) {
                return redirect()->intended('/shortlink/' . $Crypto)->with('error', 'Something went wrong!');
            }

            // Fetch data from the links table based on the extracted ID
            $link = DB::table('links')->find($shortlinkId);

            if ($link) {
                // Set the session variable
                session(['ShortlinkLink' => $link]);
                return view('frontend.pages.earns.shortlink.start');
            } else {
                return redirect()->intended('/shortlink/' . $Crypto)->with('error', 'Something went wrong!');
            }
        } else {
            return redirect()->intended('/shortlink/' . $Crypto)->with('error', 'Invalid Shortlink ID');
        }
    } else {
        abort(429);
    }
}


public function ShortlinkTaskStart(Request $request)
{
    $hasher = null;

    if (auth()->check() && count(Session('LinkVisited')) < DB::table('shortlinks')->where('id', session('ShortlinkIndex'))->value('visits')) {
        if (count(session('Visiting')) > 0) {
            return redirect()->intended(DB::table('links')->where('id', session('ShortlinkID'))->value('link'));
        } else {
            $hasher = session('Link')->where('id', session('ShortlinkID'))->value('hasher');
            // insert new waiting + redirect
            $taskInsertion = DB::table('shortlink_tasks')->insert([
                'email' => session('User')->email,
                'identifier' => session('ShortlinkID'),
                'unit' => session('PageUnit'),
                'hasher' => $hasher,
                'status' => 'FALSE',
                'created_at' => now(),
            ]);

            if ($taskInsertion) {
                // Your successful redirect logic here
                return redirect()->intended(DB::table('links')->where('id', session('ShortlinkID'))->value('link'));
            } else {
                // Handle the case where the task insertion fails
                return redirect()->intended('/')->with('error', 'Failed to insert task');
            }
        }
    } else {
        return redirect()->intended('/')->with('warning', 'Task Already Claimed');
    }
}


public function ShortlinkChecker(Request $request, $Hasher)
{
    if (Session::has('User') && session('Access') !== 'No') {
        $user = User::where('email', Session::get('User')->email)->first();

        if ($user) {
            $shortlinkIndex = Session::get('ShortlinkIndex');
            $todayVisits = DB::table('shortlink_tasks')
                ->where('email', $user->email)
                ->where('identifier', session('ShortlinkID'))
                ->whereDate('created_at', now()->toDateString())
                ->where('status', 'TRUE')
                ->get();

            $prepareCount = DB::table('shortlink_tasks')
                ->where('email', $user->email)
                ->where('identifier', session('ShortlinkID'))
                ->whereDate('created_at', now()->toDateString())
                ->where('status', 'FALSE')
                ->where('hasher', $Hasher)
                ->count();

            $claimedCount = DB::table('shortlink_tasks')
                ->where('email', $user->email)
                ->where('identifier', session('ShortlinkID'))
                ->whereDate('created_at', now()->toDateString())
                ->where('status', 'TRUE')
                ->where('hasher', $Hasher)
                ->count();

            if ($claimedCount) {
                session(['Status' => 5]);
            } elseif (!$prepareCount) {
                session(['Status' => 3]);
            }

            if (count($todayVisits) < DB::table('shortlinks')->where('id', $shortlinkIndex)->value('visits') && $prepareCount == 1) {
                $amount = session('FaucetCryptoAmount');
                $unit = session('PageUnit');
                $balance = session('Balance');
                $claimedUnit = session('ShortlinkCryptoAmount');
                $claimedUsd = session('ShortlinkUsdAmount');
                $referralBonus = session('ReferralBonus');

                if (session('User')->payout === 'faucetpay') {
                    $api = new Api(Config::get('api.faucetpay'), $unit);
                    $result = $api->send(session('User')->email, $this->removeLeadingZerosAndDecimal($claimedUnit));

                    if ($result->isSuccessful()) {
                        $data = $result->getData();
                        $this->handleSuccessfulPayment($amount, $unit, $claimedUsd, $referralBonus, $Hasher);

                    } else {
                        session(['Status' => 4]); // Handle payment failure
                    }
                } elseif (session('User')->payout === 'wallet' || session('User')->payout === 'other') {
                    $this->processWalletPayment($amount, $unit, $claimedUsd, $referralBonus, $balance, $Hasher);
                }

                // Return view only if conditions are met
                // return view('frontend.pages.earns.shortlink.check');
            }
        }
    }

    session(['Access' => 'Yes']);
    // Redirect to the previous page if conditions are not met
    return view('frontend.pages.earns.shortlink.check');
}

private function handleSuccessfulPayment($amount, $unit, $claimedUsd, $referralBonus, $Hasher)
{
    $payment = DB::table('payments')->insert([
        'email' => session('User')->email,
        'amount' => $amount,
        'type' => $unit,
        'from' => 'Shortlink',
        'paid' => $claimedUsd,
        'operation' => ucfirst(session('User')->payout),
        'created_at' => now(),
    ]);

    if (session('User')->invited_by !== null) {
        DB::table('users')
            ->where('email', session('User')->invited_by)
            ->update([
                'balance' => DB::raw('balance + ' . ($claimedUsd * $referralBonus / 100)),
            ]);
    }

    DB::table('users')
        ->where('id', session('User')->id)
        ->update([
            'total_link' => DB::raw('total_link + 1'),
        ]);

    if ($payment) {
        DB::table('seos')
            ->where('id', 1)
            ->update([
                'total_paid' => DB::raw('total_paid + ' . $claimedUsd),
            ]);

        DB::table('shortlink_tasks')
            ->where('email', session('User')->email)
            ->where('hasher', $Hasher)
            ->where('identifier', session('ShortlinkID'))
            ->where('status', 'FALSE')
            ->update([
                'status' => 'TRUE',
            ]);

        session(['Status' => 1]);
    }
}

private function processWalletPayment($amount, $unit, $claimedUsd, $referralBonus, $balance, $Hasher)
{
    $insufficientFunds = $balance <= '0.00000010';

    if ($insufficientFunds) {
        session(['Status' => 4]); // Insufficient funds, handle accordingly
    } else {
        $payment = DB::table('payments')->insert([
            'email' => session('User')->email,
            'amount' => $amount,
            'type' => $unit,
            'from' => 'Shortlink',
            'paid' => $claimedUsd,
            'operation' => ucfirst(session('User')->payout),
            'created_at' => now(),
        ]);

        if (session('User')->invited_by !== null) {
            DB::table('users')
                ->where('email', session('User')->invited_by)
                ->update([
                    'balance' => DB::raw('balance + ' . ($claimedUsd * $referralBonus / 100)),
                ]);
        }

        if ($payment) {
            DB::table('users')
                ->where('id', session('User')->id)
                ->update([
                    'balance' => DB::raw('balance + ' . $claimedUsd),
                    'total_link' => DB::raw('total_link + 1'),
                ]);

            DB::table('seos')
                ->where('id', 1)
                ->update([
                    'total_paid' => DB::raw('total_paid + ' . $claimedUsd),
                ]);

            DB::table('shortlink_tasks')
                ->where('email', session('User')->email)
                ->where('hasher', $Hasher)
                ->where('identifier', session('ShortlinkID'))
                ->where('status', 'FALSE')
                ->update([
                    'status' => 'TRUE',
                ]);

            session(['Status' => 2]);
        } else {
            session(['Status' => 4]); // Handle payment failure
        }
    }
}



    public function Session(Request $request)
    {
        if (session()->has('User') && $request->input('data') !== 'No') {
            session(['ShortlinkID' => $request->input('data')]);
            return response()->json(['data' => $request->input('data')]);
        } elseif ($request->input('data') == 'No') {
            session(['Access' => 'No']);
        } else {
            abort(429);
        }
    }


}