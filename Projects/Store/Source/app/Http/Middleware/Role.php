<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
auth
cache
carbon
user->DB
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if($request->user()->role !== $role){

            // check if role user :
            if($request->user()->role === 'user'){
                return redirect('/');
            }else if($request->user()->role === 'vendor'){
                return redirect('vendor/dashboard');
            }else if($request->user()->role === 'delivery'){
                return redirect('delivery/dashboard');
            }else if($request->user()->role === 'admin'){
                return redirect('admin/dashboard');
            }
        }

        return $next($request);
    }
}
