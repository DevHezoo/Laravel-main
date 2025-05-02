<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class SignInController extends Controller
{
    public function Loged(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $message = auth()->check() && !session()->has('Mercy') ? 'Login successfully!' : null;

        return redirect()->route('home')->with('success', $message);
    }

    public function logOut(Request $request): RedirectResponse
    {
        $url = '/'; // Default URL

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended($url)->with('success', 'Logout');
    }
}
