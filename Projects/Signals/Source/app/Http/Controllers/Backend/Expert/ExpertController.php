<?php

namespace App\Http\Controllers\Backend\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;


class ExpertController extends Controller
{
    //

    public function ExpertDashboard(){

        $admin = null;

        if (Auth::check() && Auth::user()->role === 'expert') {
            $admin = User::find(Auth::user()->id);
            return view('backend.expert.main.dashboard', compact('admin'));
        }else{
            return redirect('/');
        }
    }



}