<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class SignInController extends Controller
{

    // Login Page.
    public function SignIn(Request $request)
    {
        // Pass translations to the view
        return view('frontend.pages.signin');
    }


public function Loged(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Save User Last_Seen
    $request->user()->update(['last_seen' => Carbon::now()]);

    // Adding Cache to cookies
    $expire_time = Carbon::now()->addseconds(10); 
    Cache::put('user-is-online' . Auth::user()->id, true, $expire_time);

    toastr()->success($request->user()->role .' Login Successfully!', 'Login!');

    if($request->user()->role === 'admin'){
        return redirect()->route('admin.dashboard');
    } else if($request->user()->role === 'expert'){
        return redirect()->route('expert.dashboard');
    } else {
        return redirect()->route('home');
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function LogOut(Request $request): RedirectResponse
    {

        // Check user type {admin, vendor, delivery, user} admin expert
        $url = '/'; // Main Page

        

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->success('Logout Successfully!', 'Logout!');

        return redirect()->intended($url);

    }


}