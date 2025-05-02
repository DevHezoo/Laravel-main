<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cookie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Contact;
use App\Models\Signals;
use App\Models\News;

class Main
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $selectedLanguage;

        if(!isset($_COOKIE['Language'])){

            setcookie('Language', 'en', time() + 3600, '/');
            $selectedLanguage = 'en';
        }else{
            $selectedLanguage = $_COOKIE['Language'];
        }

        App::setLocale($selectedLanguage);
          

        // Load translations based on the selected language
        $translationsPath = resource_path("lang/{$selectedLanguage}.php");

        if (file_exists($translationsPath)) {
            $translations = require $translationsPath;
        } else {
            $translations = [];
        }

        // Ensure $translations is an array
        if (!is_array($translations)) {
            $translations = [];
        }

        // Pass the translations array to all views
        View::share('translations', $translations);


        // Check if the user is authenticated
        if (Auth::check()) {
            
            // User is authenticated
            $user = Auth::user(); // Retrieve the authenticated user

            // Save User Last_Seen
            $user->update(['last_seen' => Carbon::now()]);
            // Adding Cache to cookies
            $expire_time = Carbon::now()->addseconds(5); 
            Cache::put('user-is-online' . Auth::user()->id, true, $expire_time);
        }


        $unreadCount = Contact::where('status', 'unread')->count();

        $Signal_Guest = Signals::where('signal_type', 1)->count();
        $Signal_User = Signals::where('signal_type', 2)->count();
        $Signal_Premium = Signals::where('signal_type', 3)->count();
        $Blogs = News::orderBy('id')->count();

        View::share('unreadCount', $unreadCount);
        
        View::share('Signal_Guest', $Signal_Guest);
        View::share('Signal_User', $Signal_User);
        View::share('Signal_Premium', $Signal_Premium);

        View::share('Blogs', $Blogs);
        
        return $next($request);
    }
}
