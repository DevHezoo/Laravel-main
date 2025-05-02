<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminController extends Controller
{
    //

    public function AdminDashboard(){

        $admin = null;

        if (Auth::check() && Auth::user()->role === 'admin') {
            $admin = User::find(Auth::user()->id);
            return view('backend.admin.main.dashboard', compact('admin'));
        }else{
            return redirect('/');
        }
    }

    public function AdminLogin(){

    return view('backend.admin.pages.login');
    }



}