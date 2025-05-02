<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Notification;
use DB;
use Illuminate\Support\Carbon;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => fake()->name(),
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'token' => base64_encode(random_bytes(32)),
        ]);


        $notification = array(
            'message' => 'Registered Successfully',
            'alert-type' => 'success'
        );


        event(new Registered($user));

        Auth::login($user);

        // New Register user will send notification to admin that new user has been registered

        // return redirect()->intended('/')->with($notification);
        // return redirect(RouteServiceProvider::HOME);
          // return redirect(RouteServiceProvider::HOME)->with($notification);
         return redirect()->intended("/")->with($notification);
    }
}
