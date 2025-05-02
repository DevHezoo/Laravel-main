<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class NewsController extends Controller
{
    //Comment

    public function Comment(Request $request, $ID)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        Comments::insert([
        'blog_id' => $ID,
        'user_id' => $user->id,
        'comment' => $request->comment,
        'created_at' => Carbon::now()
        ]);


        return redirect()->back();
    }

}
