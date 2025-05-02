<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mahtab2003\FaucetPay\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use App\Models\Seo;
use App\Models\Shortlink;
use App\Models\ShortlinkTask;
use App\Models\Links;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Session;

class MainController extends Controller
{

    // Question Page.
    public function Question(Request $request){

    	$question = DB::table('quizzes')
    		->insert([
            'author' => Auth::user()->id,
            'question' => $request->input('Question'),
            'accent_rate' => $request->input('Rate'),
            'answer' => $request->input('Answer'),
            'created_at' => Carbon::now(),
            ]);

    }


}