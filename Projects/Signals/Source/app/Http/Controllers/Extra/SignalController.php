<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Signals;
use App\Models\Comments_Signals;
use Carbon\Carbon;
class SignalController extends Controller
{
    //
    public function Signal(Request $request, $ID)
    {

        $Me =null;

        $Signal = Signals::where('id', $ID)->first();

        if(auth()->check()) {
        $id = Auth::user()->id;
        $Me = User::find($id);
        }

        $User = User::where('id', $Signal->author_id)->first();

        $Comments = Comments_Signals::where('signal_id', $ID)->get();

        return view('frontend.pages.signal', compact('User','Signal','Comments','Me'));
    }


    public function Comment(Request $request, $ID)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        Comments_Signals::insert([
        'signal_id' => $ID,
        'user_id' => $user->id,
        'comment' => $request->comment,
        'created_at' => Carbon::now()
        ]);


        return redirect()->back();
    }



}