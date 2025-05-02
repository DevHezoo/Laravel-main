<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class SignUpController extends Controller
{

    // Register Page.
    public function SignUp(): View
    {
        // Pass translations to the view
        return view('frontend.pages.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function SignedUp(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $fakeUsername = 'T' . mt_rand(10000000, 99999999);

        $user = User::create([
            'username' => $fakeUsername,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => base64_encode(random_bytes(32)),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended('/')->with('success', 'SignUp');

    }


}