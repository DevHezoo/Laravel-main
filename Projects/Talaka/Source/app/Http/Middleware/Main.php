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
    protected $User;
    protected $Quiz;
    protected $Questions;
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->Seo = DB::table('seos')->where("id", '1')->first();
        session(['Seo' => $this->Seo]);

        $this->checkUserAuthentication();
        return $next($request);
    }

    protected function checkUserAuthentication()
    {
        if (Auth::check()) {
            $this->handleAuthenticatedUser();
        }
    }

    protected function handleAuthenticatedUser()
    {
        $this->User = Auth::user();
        session(['User' => $this->User]);
        $this->User->update(['last_seen' => Carbon::now()]);

        $this->Questions = DB::table('questions')
        ->whereNotNull('ans_3')
        ->count();
        
        $this->Quiz = DB::table('quizzes')
        ->where('author', Auth::user()->id)
        ->orderBy('question', 'desc')
        ->first();

        if($this->Quiz == null){
            session(['Quiz' => 0]);
        }else{
            session(['Quiz' => $this->Quiz->question]);
        }
  
        session(['Questions' => $this->Questions]);

    }


}