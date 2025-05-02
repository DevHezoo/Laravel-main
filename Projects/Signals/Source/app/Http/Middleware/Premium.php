<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Premium
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user()) {

        // Retrieve the user's role directly from the authenticated user
        $userRole = $request->user()->role;
        // Check the user's role and redirect accordingly
        if ($userRole !== 'premium') {
            return redirect('/live');
        }
        }

        return $next($request);
    }
}
