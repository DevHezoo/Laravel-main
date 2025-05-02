<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the user's role directly from the authenticated user expert/dashboard admin/dashboard
        $userRole = $request->user()->role;

        // Check the user's role and redirect accordingly
        if ($userRole === 'user') {
            return redirect('/');
        }
        // If the role doesn't match any of the specified roles, proceed with the request
        return $next($request);
    }
}
