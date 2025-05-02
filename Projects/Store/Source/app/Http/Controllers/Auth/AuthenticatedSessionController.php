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



        // Save User Last_Seen
        $request->user()->update(['last_seen' => Carbon::now()]);

        //Adding Cache to cookies
        $expire_time = Carbon::now()->addMinutes(1); 
        Cache::put('user-is-online' . Auth::user()->id, true, $expire_time);



        // Check user type {admin, vendor, delivery, user}
        $url = '';

        if($request->user()->role === 'admin'){
            $url = 'admin/dashboard';
        }else if($request->user()->role === 'vendor'){
            $url = 'vendor/dashboard';
        }else if($request->user()->role === 'delivery'){
            $url = 'delivery/dashboard';
        }else if($request->user()->role === 'user'){
            $url = '/'; // Main Page
        }

        // return redirect()->intended(RouteServiceProvider::HOME);
         return redirect()->intended($url)->with($notification);

 // Handle user request
//         if ($request->user()->role !== $role){
//             // User denied to access
//             return redirect('/'); // "/" => Home Page ().name(home)
//         }

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

        // Check user type {admin, vendor, delivery, user}
        $url = '';

        if($request->user()->role === 'admin'){
            $url = 'admin/login';
        }else if($request->user()->role === 'vendor'){
            $url = '/vendor/login';
        }else if($request->user()->role === 'delivery'){
            $url = 'delivery/login';
        }else if($request->user()->role === 'user'){
            $url = '/login'; // Main Page
        }


        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->intended($url)->with($notification);

        // return redirect('/');
    }
}
