<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use Illuminate\Support\Facades\Log;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $notification = array(
            'message' => 'Login Successfully',
            'alert-type' => 'success'
        );

        // // Save User Last_Seen
        // $request->user()->update(['last_seen' => Carbon::now()]);

        // //Adding Cache to cookies
        // $expire_time = Carbon::now()->addSeconds(30); 
        // Cache::put('user-is-online' . Auth::user()->id, true, $expire_time);

        if (Auth::check()) {
           $expireTime = Carbon::now()->addSeconds(30);
           Cache::put('user-is-online' . Auth::user()->id, true,$expireTime);
           User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        // Log::info('Your debug message or variable data goes here');

        $url = '';

        if($request->user()->role === 'admin'){
            $url = '/admin/dashboard';
        }else if($request->user()->role === 'employee'){
            $url = '/employee/dashboard';
        }else if($request->user()->role === 'user'){
            $url = '/'; // Main Page
        }

         return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        $url = '';

        if($request->user()->role === 'admin'){
            $url = '/admin';
        }else if($request->user()->role === 'employee'){
            $url = '/employee';
        }else if($request->user()->role === 'user'){
            $url = '/login'; // Main Page
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended($url)->with($notification);
    }



}
