<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    // Home Page.
    public function Home(Request $request)
    {
        // Pass translations to the view
        return view('frontend.main.index');
    }

    public function changeLanguage($locale, Request $request)
    {
        setcookie('Language', $locale, time() + 3600, '/');
        // Set the language in a cookie

        return response('Language updated');
    }

}