<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Start Viewing the Contact Page
    public function Contact(){
        return view ('frontend.pages.contact');
    }
}
