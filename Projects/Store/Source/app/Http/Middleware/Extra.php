<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\View;
use App\Models\Wishlist;
use App\Models\Compare;
use Auth;

use App\Models\Blog;
class Extra
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $wishlistCount = Wishlist::where('user_id', Auth::id())->count(); // Execute the query and get the count
        View::share('wishlistCount', $wishlistCount);

        $compareCount = Compare::where('user_id', Auth::id())->count(); // Execute the query and get the count
        View::share('compareCount', $compareCount);


        $feeds = Blog::orderByRaw('(created_at) DESC')->take(8)->get();
        View::share('feeds', $feeds);

        return $next($request);
    }
}
