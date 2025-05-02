<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use View;
use Illuminate\Support\Facades\Log;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {


        if (Auth::check()) {
           $expireTime = Carbon::now()->addSeconds(30);
           Cache::put('user-is-online' . Auth::user()->id, true,$expireTime);
           User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }


    if ($request->user() && $request->user()->role !== $role) {
        // check if role user :
            if($request->user()->role === 'user'){
                return redirect('home');
            }else if($request->user()->role === 'employee'){
                return redirect('employee');
            }else if($request->user()->role === 'admin'){
                return redirect('admin');
            }
    }
        // if($request->user()->role !== $role){

        //     // check if role user :
        //     if($request->user()->role === 'user'){
        //         return redirect('home');
        //     }else if($request->user()->role === 'employee'){
        //         return redirect('employee/login');
        //     }else if($request->user()->role === 'admin'){
        //         return redirect('admin/login');
        //     }
        // }


// Log::info('Your debug message or variable data goes here');

        // if (Auth::check()) {
        //    $expireTime = Carbon::now()->addSeconds(30);
        //    Cache::put('user-is-online' . Auth::user()->id, true,$expireTime);
        //    User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        // }

        // if ($request->user()->role !== $role) {
        //    return redirect('/');
        // }

        $unreadCount = Contact::where('status', 'unread')->count();
        View::share('unreadCount', $unreadCount);

        return $next($request);
                // return $next($request);
    }
}
