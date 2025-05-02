<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Mahtab2003\FaucetPay\Api;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;
class Main
{
    protected $Seo;
    protected $Shortlinks;
    protected $Faucet_Claimed;
    protected $Shortlink_Claimed;
    protected $Links;
    protected $Tasks; //DB::table('shortlinks')->sum('visits') total sum shortlink to visit
    protected $Question;
    protected $Answer;
    protected $Last_Claimed;
    protected $Total_Links;
    protected $Total_Visited;
    protected $Visited;
    protected $IP;
    protected $Link;

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->IP = $request->ip();

        if(request()->has('ref')){
            session(['Ref' => request('ref') ]);
        }
        // Check if the user is authenticated
        if (Auth::check()) {
            session(['Verify' => hash('sha256', Auth::user()->verify) ]);
            
            if (!session()->has('PageUnit')) {
                session(['PageUnit' => 'BTC']);
                session(['Access' => 'Yes']);
            }else{
                $cryptoSymbols = 
                [ 'BTC', 'LTC', 'DOGE', 'TRX',
                  'BNB', 'BCH', 'DASH', 'DGB',
                  'ETH', 'FEY', 'SOL', 'ZEC', 'USDT'];

                if (!in_array(session('PageUnit'), $cryptoSymbols)) 
                { session(['PageUnit' => 'BTC']);}
            }

            if ($request->routeIs('faucet.page', 'shortlink.page')) {
                $unit = strtoupper($request->route('Crypto'));
                session(['PageUnit' => $unit]); 
            }
        }

        $this->setLanguageCookie();

        $this->shareTranslations();

        $this->loadData();

        $this->IPChecker();

        return $next($request);
    }

    protected function setLanguageCookie()
    {
        $selectedLanguage = $this->getSelectedLanguage();

        setcookie('Language', $selectedLanguage, time() + 3600, '/');
        App::setLocale($selectedLanguage);
    }

    protected function getSelectedLanguage()
    {
        return isset($_COOKIE['Language']) && in_array($_COOKIE['Language'], ['en', 'es', 'fr'])
            ? $_COOKIE['Language']
            : 'en';
    }

    protected function shareTranslations()
    {
        $selectedLanguage = App::getLocale();
        $translationsPath = resource_path("lang/{$selectedLanguage}.php");
        $translations = file_exists($translationsPath) ? require $translationsPath : [];

        View::share('translations', is_array($translations) ? $translations : []);
    }

    protected function loadData()
    {
        $this->Seo = DB::table('seos')->where("id", '1')->first();
        View::share('seo', $this->Seo);
        session(['Seo' => $this->Seo]);

        $this->Shortlinks = DB::table('shortlinks')->get();
        $this->Links = DB::table('shortlink_tasks')->get();
        $this->Tasks = DB::table('shortlinks')->sum('visits');
        $this->Link = DB::table('links')->get();

        $this->loadRandomQuestion();

        $this->Total_Links = DB::table('shortlinks')->sum('visits');
        session(['VisitCount' => $this->Total_Links]);

        $this->checkUserAuthentication();

        $this->IPChecker();
    }

    protected function loadRandomQuestion()
    {
        $randomQuestion = DB::table('questions')->inRandomOrder()->first();
        $this->Question = $randomQuestion->question;
        $this->Answer = $randomQuestion->answer;
    }

    protected function checkUserAuthentication()
    {
        if (Auth::check()) {
            $this->handleAuthenticatedUser();
        }
    }

    protected function handleAuthenticatedUser()
    {
        $user = Auth::user();
        session(['User' => $user]);

        $this->updateUserLastSeen($user);

        Cache::put('user-is-online' . $user->id, true, Carbon::now()->addseconds(5));

        session(['Link' => $this->Link]);
        session(['RequestsPayout' => DB::table('requests')->where('email', $user->email)->get()]);
        session(['Invited' => DB::table('users')->where('invited_by', $user->email)->get()]);
    }

    protected function updateUserLastSeen($user)
    {
        $user->update(['last_seen' => Carbon::now()]);
    }

    protected function IPChecker()
    {
        
        // $this->IP = $request->ip();
        // $ip = $request->ip();
        // $ip = '102.185.185.105'; //no vpn
        // $ip = '51.81.200.155'; //vpn
        session(['IP' => $this->IP]);
        $process = null;
        $apiUrl = 'https://proxycheck.io/v2/' .$this->IP .'?vpn=1&asn=1';
        $response = Http::get($apiUrl);
        if ($response->successful()) {
            $process = 'True';
            $result = $response->json();
        $Data = [
            'status' => $result['status'] ?? '',
            'asn' => $result[$this->IP]['asn'] ?? '',
            'country' => $result[$this->IP]['country'] ?? '',
            'region' => $result[$this->IP]['region'] ?? '',
            'timezone' => $result[$this->IP]['timezone'] ?? '',
            'city' => $result[$this->IP]['city'] ?? '',
            'postcode' => $result[$this->IP]['postcode'] ?? '',
            'latitude' => $result[$this->IP]['latitude'] ?? '',
            'longitude' => $result[$this->IP]['longitude'] ?? '',
            'currency' => [
                'code' => $result[$this->IP]['currency']['code'] ?? '',
                'name' => $result[$this->IP]['currency']['name'] ?? '',
                'symbol' => $result[$this->IP]['currency']['symbol'] ?? '',
            ],
            'proxy' => $result[$this->IP]['proxy'] ?? '',
            'type' => $result[$this->IP]['type'] ?? '',
        ];
        session(['Data' => $Data]);
        } else {
        $Data = [
            'status' => $result['error'] ?? '',
        ];
        session(['Data' => $Data]);
        }

        if (Auth::check()) {
            $this->getBalance();
        }
    }

    protected function getBalance()
    {
        $resultPath1 = public_path('frontend/assets/data/result/balance.txt');
        $jsonData1 = file_get_contents($resultPath1);
        $balance = json_decode($jsonData1, true);


        $resultPath2 = public_path('frontend/assets/data/result/data.txt');
        $jsonData2 = file_get_contents($resultPath2);
        $prices = json_decode($jsonData2, true);

        // Update the session variable with prices
        session(['AllPrices' => $prices]);
        session(['Balance' => $balance]);

        if (Auth::check()) {
            $this->handleFirst();
        }
    }

    protected function handleFirst()
    {
        $this->Visited = DB::table('shortlink_tasks')
            ->where('email', session('User')->email)
            ->where('identifier', session('ShortlinkID'))
            ->whereDate('created_at', '=', today())
            ->where('status','TRUE')
            ->get();

        $Prepare = DB::table('shortlink_tasks')
            ->where('email', session('User')->email)
            ->where('identifier', session('ShortlinkID'))
            ->whereDate('created_at', '=', today())
            ->where('status','FALSE')
            ->get();


        session(['Visiting' => $Prepare]);
        session(['LinkVisited' => $this->Visited]);
            

        $this->Total_Visited = DB::table('shortlink_tasks')
            ->where('email', auth()->user()->email)
            ->whereDate('created_at', today())
            ->where('status', 'TRUE')
            ->count();

        $this->Faucet_Claimed = DB::table('payments')
            ->where('email', auth()->user()->email)
            ->where('from', 'Faucet')
            ->whereDate('created_at', Carbon::today())
            ->count();

        $this->Last_Claimed = DB::table('payments')
            ->latest('created_at')
            ->where('email', session('User')->email)
            ->where('type', strtoupper(session('PageUnit')))
            ->first();



        $this->Shortlink_Claimed = DB::table('shortlink_tasks')
            ->where('email', session('User')->email)
            ->where('status', 'TRUE')
            ->whereDate('created_at', Carbon::today())
            ->count();

        $this->handleSecond();
    }

    protected function handleSecond()
    {
        
        session(['FaucetRate' => $this->Seo->faucet_usd]);
        session(['ShortlinkRate' => $this->Seo->shortlink_usd]);

        session(['CryptoPrice' => session('AllPrices')[session('PageUnit')]]);

        session(['FaucetCryptoAmount' => number_format(session('FaucetRate') / session('CryptoPrice'), 8, '.', '')]);
        session(['ShortlinkCryptoAmount' => number_format(session('ShortlinkRate') / session('CryptoPrice'), 8, '.', '')]);

        session(['FaucetUsdAmount' => number_format(session('FaucetCryptoAmount') * session('CryptoPrice'), 14, '.', '')]);
        session(['ShortlinkUsdAmount' => number_format(session('ShortlinkCryptoAmount') * session('CryptoPrice'), 14, '.', '')]);

        session(['FaucetLimit' => $this->Seo->faucet_limit]);
            
        session(['FaucetClaimed' => $this->Faucet_Claimed]);
        session(['ShortlinkClaimed' => $this->Shortlink_Claimed]);

        session(['FaucetRemaining' => max(0, $this->Seo->faucet_limit - $this->Faucet_Claimed)]);
        session(['ShortlinkRemaining' => $this->Tasks - $this->Shortlink_Claimed]);


        session(['Question' => $this->Question]);
        session(['Answer' => $this->Answer]);

        session(['Timer_Unit' => "timer_" . strtolower(session('PageUnit'))]);
        session(['Timer' => $this->Seo->{session('Timer_Unit')}]);

        session(['ReferralBonus' => $this->Seo->referral_bonus]);
            

        $this->handleThird();
    }

    protected function handleThird()
    {

        if ($this->Last_Claimed) 
        {
            $this->Last_Claimed = $this->Last_Claimed->created_at;
        } else {
            $this->Last_Claimed = now()->subYear()->format('Y-m-d H:i:s');
        }

        session(['TimeLeft' => max(0, session('Timer') -  now()->diffInSeconds($this->Last_Claimed) )  ]);

        session(['TotalShortlink' => $this->Tasks]);
        session(['TodayVisited' => $this->Total_Visited]);


        $userLinks = session('User')->links;
        if (strpos($userLinks, '(') === false || strpos($userLinks, ')') === false) {
            Artisan::call('update:link', ['userId' => session('User')->id]);
        }


        session(['Shortlinks' => $this->Shortlinks]);
        session(['ShortlinksTask' => $this->Links]);

        if(session('FaucetClaimed') >= session('FaucetLimit') && session('TodayVisited') >= session('TotalShortlink') && !Carbon::parse(auth()->user()->claimed)->isToday()){
            session(['Bonus' => 'True']);
        }else{
            session(['Bonus' => 'False']);
        }


    }

}