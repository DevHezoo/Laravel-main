<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use Mahtab2003\FaucetPay\Api;
use App\Models\Payment;
use App\Models\Requests;
use App\Models\Seo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Shortlink;
use App\Models\ShortlinkTask;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Http;
use App\Models\Videos;

class PagesController extends Controller
{

    function removeLeadingZerosAndDecimal($value) {
        $stringValue = preg_replace('/^0\.?0*/', '', strval($value));
        return intval($stringValue);
    }

    // Faucets Page.
    public function Faucets(Request $request)
    {
        return view('frontend.pages.earns.faucet.faucets');
    }

    // Faucet Page.
    public function FaucetPage($Crypto)
    {
        if (auth()->check() && auth()->user()->status == 'TRUE') {
            session(['PageUnit' => strtoupper($Crypto)]);
            return view('frontend.pages.earns.faucet.faucet'); 
        } else {
            return view('frontend.pages.pages.verify');
        }
    }


    // Profile Page.
    public function Profile(Request $request)
    {
        if (Auth::check() && Auth::user()->status == 'TRUE') {
            $userEmail = Auth::user()->email;

            $requests = Requests::orderBy('created_at', 'desc')
                ->where('email', $userEmail)
                ->take(20)
                ->get();

            return view('frontend.pages.user.settings', compact('requests'));
        } else {
            return view('frontend.pages.pages.verify');
        }
    }

    // Bonus Page.
    public function Bonus(Request $request)
    {
        if(auth()->check())
        {
            $payments = Payment::latest()->where('email', session('User')->email)->get();
            return view('frontend.pages.earns.bonus',compact('payments'));
        }else{
            abort(429);
        }
    }

    // Log Page.
    public function Log()
    {
        return view('frontend.pages.pages.log');
    }

    // Log Page.
    public function Privacy()
    {
        return view('frontend.pages.pages.privacy');
    }

    // Cookie Page.
    public function Cookie()
    {
        return view('frontend.pages.pages.cookie');
    }

    // Contact Page.
    public function Contact()
    {
        return view('frontend.pages.pages.contact');
    }

    // Start Page.
    public function Start()
    {
        return view('frontend.pages.pages.start');
    }

    public function Tutorial()
    {
        $videos = Videos::orderBy('created_at', 'desc')->take(20)->get();
        return view('frontend.pages.pages.tutorial',compact('videos'));
    }
    
    public function Alert()
    {
        return view('frontend.pages.pages.alert');
    }

    public function Verification()
    {
        if(auth()->check() && session('User')->status == 'FALSE')
        {
            return view('frontend.pages.pages.verify');
        }else{
            return redirect()->route('home');
        }
    }


public function SendVerify()
{
    // dd(Crypt::decrypt(session('Verify')));
    if (auth()->check()) {
        $token = Config::get('api.verify');

        $jsonResponse = Http::get("https://api.telegram.org/bot{$token}/getUpdates");
        $data = json_decode($jsonResponse, true);

        $verifyContentFound = false;

        foreach ($data['result'] as $result) {
            if (!empty($result['message']['text']) && $result['message']['text'] === hash('sha256', Auth::user()->verify)) {
                $verifyContentFound = true;

                $userId = isset($result['message']['from']['id']) ? $result['message']['from']['id'] : null;
                $firstName = isset($result['message']['from']['first_name']) ? $result['message']['from']['first_name'] : null;
                $lastName = isset($result['message']['from']['last_name']) ? $result['message']['from']['last_name'] : null;
                $username = isset($result['message']['from']['username']) ? $result['message']['from']['username'] : null;
                $chatId = isset($result['message']['chat']['id']) ? $result['message']['chat']['id'] : null;

                $firstname = isset($result['message']['from']['first_name']) ? $result['message']['from']['first_name'] : "Anonymous";
                $lastname = isset($result['message']['from']['last_name']) ? $result['message']['from']['last_name'] : "User";

                $otherAccounts = DB::table('users')
                    ->where('email', '!=', auth()->user()->email) // Exclude the current user
                    ->where('telegram_id', $chatId)
                    ->get();


                    DB::table('users')
                        ->where('id', auth()->id())
                        ->update([
                            'name' => $firstname . ' ' . $lastname, // Added a space between first and last name
                            'status' => 'TRUE',
                            'telegram_id' => $chatId,
                        ]);


                if (count($otherAccounts) === 0) {
                    
                    // Send a message to the user
                    $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                        'chat_id' => $chatId,
                        'text' => 'Email: ' . session('User')->email . "\n" . 'Has Been Approved.',
                    ]);

                    return redirect()->intended('/')->with('success', 'Account has been Activated!');
                }
            }
        }

        if (auth()->user()->status == 'TRUE') {
            // Already verified
            return redirect()->intended('/verify')->with('error', 'Already Verified');
        }

        if(!$verifyContentFound){
            return redirect()->intended('/verify')->with('error', 'Please Send Your Code to Our Telegram Bot');
        }

    } else {
        abort(429);
    }
}

  // Shortlink Page.
    public function ShortlinkPage($Crypto)
    {
        if (auth()->check() && auth()->user()->status == 'TRUE') {
            session(['PageUnit' => strtoupper($Crypto)]);
            return view('frontend.pages.earns.shortlink.shortlink');
        } else {
            return view('frontend.pages.pages.verify');
        }
    }

    // prize Page.
public function Prize(Request $request, $Code)
{
    $isSuccessful = null;
    $unit = null;
    $amount = null;

    $prize = DB::table('videos')
        ->where('email', Auth::user()->email)
        ->where('code', $Code)
        ->where('status', 'FALSE')
        ->first();

    if ($prize) {
        
        list($amount, $unit) = explode(' ', $prize->prize);

        DB::table('videos')
            ->where('email', Auth::user()->email)
            ->where('code', $Code)
            ->where('status', 'FALSE')
            ->update([
                    'status' => 'TRUE',
            ]);

            $api = new Api(Config::get('api.faucetpay'), $unit);
            $result = $api->send(Auth::user()->email, $this->removeLeadingZerosAndDecimal($amount));

            if ($result->isSuccessful()) {
                $isSuccessful = 1;
                    $payment = DB::table('payments')->insert([
                        'email' => Auth::user()->email,
                        'amount' => $amount,
                        'type' => $unit,
                        'from' => 'Prize',
                        'paid' => $amount,
                        'operation' => 'Faucetpay',
                        'created_at' => Carbon::now(),
                    ]);
            }
    }

    return view('frontend.pages.pages.prize', compact('isSuccessful', 'unit', 'amount'));
}


    public function Test1()
    {
        return view('frontend.pages.pages.test1');
    }

    public function Test2()
    {
        return view('frontend.pages.pages.test2');
    }

    public function Test3()
    {
        return view('frontend.pages.pages.test3');
    }

    public function Test4()
    {
        return view('frontend.pages.pages.test4');
    }

    public function Test5()
    {
        return view('frontend.pages.pages.test5');
    }

    }