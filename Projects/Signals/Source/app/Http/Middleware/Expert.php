<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Expert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated and has the role of 'expert'
        if (Auth::check() && Auth::user()->role === 'expert') {
            return $next($request);
        } 

        // Redirect to home for non-expert users
        return redirect('/');

    }
}
