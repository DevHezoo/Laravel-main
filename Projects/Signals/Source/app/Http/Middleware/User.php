<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
// if (Auth::check() && Auth::user()->role === 'user') {
class User
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->user()) {

        // Retrieve the user's role directly from the authenticated user
        $userRole = $request->user()->role;
        // Check the user's role and redirect accordingly
        if ($userRole !== 'user') {
            return redirect('/live');
        }
        }

       return $next($request);
    }

}