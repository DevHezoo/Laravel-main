<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Signals;
use App\Models\User;
use App\Models\News;
use App\Models\MultiImgs;
use App\Models\Comments;

class PagesController extends Controller
{
    // Live Page.
    public function Live(Request $request)
    {
        // Find all Signals
        $signals = Signals::orderBy('created_at', 'desc')->get();
        $user=null;

        if(auth()->check()) {
        $id = Auth::user()->id;
        $user = User::find($id);
        }
        return view('frontend.pages.live', compact('signals','user'));
    }

    // News Page.
    public function Price()
    {
        $user=null;

        if(auth()->check()) {
        $id = Auth::user()->id;
        $user = User::find($id);
        }
        return view('frontend.pages.price', compact('user'));
    }

    // News Page.
    public function News()
    {
        $News = News::orderBy('created_at', 'desc')->get();
        $Last = News::orderBy('created_at', 'desc')->first();
        $author_last = $Last->author;


        // ,'author_Currently'

        return view('frontend.pages.news', compact('News','Last', 'author_last'));
    }

    // Blog Page.
    public function Blog(Request $request, $ID)
    {
        // Find Specific Product By product_code
        $New = News::where('id', $ID)->first();
        $User = User::where('id', $New->article_author_id)->first();

        $Article_Imgs = MultiImgs::where('blog_id', $ID)->get();
        $Comments = Comments::where('blog_id', $ID)->get();

        return view('frontend.pages.new', compact('New','User','Article_Imgs','Comments'));
    }

    public function Contact()
    {
        return view('frontend.pages.contact');
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.pages.profile', compact('user'));
    }


}