<?php

namespace App\Http\Controllers\Frontend;

use Cookie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	// Home Page.
	public function Register(Request $request)
	{
	    $request->validate([
	        'email' => 'required|email',
	        'firstname' => 'required',
	        'lastname' => 'required',
	        'password' => 'required|min:1',
	        'confirm' => 'required',
	        'phone' => 'required',
	    ]);

	    // Check if 'check' exists in the request and is truthy
	    if ($request->has('check') && $request->input('check') === 'checked') {

	       $user = User::firstOrNew(['email' => $request->email]);
	       $newsleter = NewsLetter::firstOrNew(['email' => $request->email]);

	       if (!$newsleter->exists) {
	       	$newsleter->email = $request->email;
	       	$newsleter->save();
	       }

	       if (!$user->exists) {
	       	$user->phone = $request->phone;
	       	$user->firstname = $request->firstname;
	       	$user->lastname = $request->lastname;
	       	$user->email = $request->email;
	       	$user->password = Hash::make($request->password);
	       	$user->level = '1';
	       	$user->gender = strtolower($request->gender);
	       	$user->identifier = Str::uuid();
            $user->save();

			Mail::raw('Welcome to, ' . session('Seo')->meta_title . '.', function ($message) use ($request) {
			    $message->to($request->email)
			        ->subject('Welcome Msg');
			});

			return redirect()->intended('/sign-in')->with('success', 'Created!');

	       }else{
	       	return redirect()->intended('/sign-up')->with('error', 'Please use another email.');
	       }


	    } else {
	        return redirect()->intended('/sign-up')->with('error', 'Please agree to the terms and conditions.');
	    }
	}


    public function Login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Welcome Back!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function LogOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Logout!');
    }

}
