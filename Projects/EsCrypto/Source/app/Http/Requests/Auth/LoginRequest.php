<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Mahtab2003\FaucetPay\Api;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');

        if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            $user = $this->findUserByEmail($credentials['email']);

            if ($user) {
                $this->toastrError('Oops! Wrong Password!', 'Login!');
                RateLimiter::hit($this->throttleKey());
                throw ValidationException::withMessages([
                    'password' => trans('auth.failed'),
                ]);
            } else {
                $email = $credentials['email'];

                if ($this->checkFaucetPayAccount($email)) {
                    $this->registerUser($email, $credentials['password']);
                } else {
                    $this->toastrError('Oops! Invalid FaucetPay Account!', 'Login!');
                }
            }
        }

        $this->checkMercyLeft($credentials['email']);

        RateLimiter::clear($this->throttleKey());
    }

    private function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    private function findUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    private function checkFaucetPayAccount($email)
    {
        $api = new Api(Config::get('api.faucetpay'), 'BTC');
        $result = $api->checkAddress($email);

        return $result->isSuccessful();
    }

    private function registerUser($email, $password)
    {
        $user = User::firstOrNew(['email' => $email]);
        $ref = DB::table('users')->where("verify", session('Ref'))->first();
        $rand = null;

        if (!$user->exists) {
            $rand = 'Escrypto-' . mt_rand(10000000, 99999999);
            $user->password = Hash::make($password);
            $user->country =  session('Data')['country'];
            $user->city =  session('Data')['city'];
            $user->proxy =  session('Data')['proxy'];
            $user->type =  session('Data')['type'];
            $user->verify = $rand;
            $user->ip = $this->ip();
            if ($ref) {$user->invited_by = $ref->email;}
            $user->save();

            Mail::raw('Welcome to, ' . session('Seo')->meta_title . '.', function ($message) use ($email) {
                $message->to($email)
                    ->subject('Welcome Msg');
            });

            event(new Registered($user));
            Auth::login($user);
        }
    }

    private function checkMercyLeft($email)
    {
        $user = User::where('email', $email)->first();

        if ($user && $user->mercy_left <= 0) {
            $lastSeen = $user->last_seen;

            if ($lastSeen && now()->diffInDays($lastSeen) >= 1) {
                $user->update(['mercy_left' => 12]);
            }
        }
    }

    private function toastrError($message, $title)
    {
        toastr()->error($message, $title);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
