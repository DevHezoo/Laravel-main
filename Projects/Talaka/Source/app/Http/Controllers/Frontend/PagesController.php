<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\NewsLetter;
use App\Models\Contact;
use App\Models\Articles;
use App\Models\Live;
use App\Models\Questions;
use App\Models\Quiz;
use App\Models\Limitation;
use App\Models\Recorder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PagesController extends Controller
{
    // Home Page.
    public function home(Request $request)
    {
        $totalDays = 1;
        $createdAtTimestamp = session('Seo')->created_at;
        $daysDifference = now()->diffInDays($createdAtTimestamp);
        $totalDays += $daysDifference;
        session(['Days' => $totalDays]);
        session(['Users' => User::count()]);
        // Pass translations to the view
        return view('frontend.main.dashboard');
    }

    // Register Page.
    public function RegisterPage()
    {
        return view('frontend.pages.pages.signup');
    }

    // Login Page.
    public function LoginPage()
    {
        return view('frontend.pages.pages.signin');
    }

    // Login Page.
    public function Subscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $newsleter = NewsLetter::firstOrNew(['email' => $request->email]);
        
        if (!$newsleter->exists) {
            $newsleter->email = $request->email;
            $newsleter->save();

            Mail::raw('Thanks.', function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('subscription Msg');
            });

            return redirect()->intended('/')->with('success', 'Subscribed Successfully!');
        }else{
            return redirect()->intended('/')->with('error', 'Something Went Wrong!');
        }

    }

    // Profile Page.
    public function ProfilePage()
    {
        $quizs = Quiz::orderBy('question', 'ASC')
        ->where('author', Auth()->user()->id)
        ->get();

        return view('frontend.pages.user.profile',compact('quizs'));
    }

    // Contact Page.
    public function ContactPage()
    {
        return view('frontend.pages.pages.contact');
    }

    // Contact Submit.
    public function Contact(Request $request)
    {

        $ticket = mt_rand(10000000, 99999999);

        $contact = Contact::firstOrNew(['email' => $request->email, 'status' => 'FALSE']);

        if (!$contact->exists) {
            $contact->uuid = $ticket;
            $contact->fullname = $request->fullname;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;              
            $contact->save();

            Mail::raw('Dear ' . $request->fullname . "\nKindly wait until our support reaches out to you soon.\nTicket ID:\n" . $ticket . "\n\nSubject:\n" . $request->subject . "\nMessage:\n" . $request->message, function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Ticket Msg');
            });


            return redirect()->intended('/')->with('success', 'Ticket Successfully Send!');
        }else{
            return redirect()->intended('/')->with('error', 'Already Under Review!');
        }


    }


    // Articles Page.
    public function ArticlesPage($Page)
    {
        $lvl = null;
        $articles = Articles::orderBy('id', 'desc')->get();

// 
        $PerPage = 15;

        $TotalPages = ceil($articles->count() / $PerPage);
        
        // To know Currenly Page We Visiting ?page=1
        $CurrentlyPage = $Page;

        // Convert Articles to Store As arrays
        $ArticlesAsArray = $articles->toArray();

        // Slice The Products Based on Currently Page
        $CurrentlyPageArticles = array_slice($ArticlesAsArray, ($CurrentlyPage - 1) * $PerPage, $PerPage);
        // dd($CurrentlyPageArticles[0]['level']);
// 

        if(Auth()->check()){
            $lvl = Session::get('User')->level;
        }else{
            $lvl = '0';
        }

        if(!$CurrentlyPageArticles){
            abort(404);
        }

        return view('frontend.pages.pages.articles', compact('lvl','articles','TotalPages','CurrentlyPage','CurrentlyPageArticles'));
    }

    // Articles Page.
    public function ArticlePage($ID){
        $lvl = null;
        $article = Articles::where('id', $ID)->first();
        $imgs = explode("|", $article->img);
        $tags = explode("|", $article->tag);

        if(Auth()->check()){
            $lvl = Session::get('User')->level;

        }else{
            $lvl = '0';
        }

        $user = User::where('id', $article->author)->first();

        if(intval($lvl) >= intval($article->level)){
            return view('frontend.pages.pages.article',compact('ID','article','user','imgs','tags'));
        }

        return redirect()->intended('/articles')->with('error', 'Access Denied!');
        
    }


    // LivePage Page.
    public function LivePage(){

        $live = Live::where('id', '1')->first();

        // Prepare the data to be passed to the view
        $titleToShow = ($live->status == 'FALSE') ? 'No Live For Now' : "Live Title: " .$live->title;


        $user = User::where('id', $live->author)->first();
        $tags = explode("|", $live->tag);
        return view('frontend.pages.pages.live',compact('live','user','tags','titleToShow'));

        
    }

    // ChatPage Page.
    public function ChatPage(){

        return view('chat.chat');

        
    }

    // QuizPage Page.
    public function QuizPage(){
        $questions = Questions::orderBy('id', 'ASC')->get();
        return view('frontend.pages.pages.quiz', compact('questions'));   
    }


    // VideoPage Page.
    public function VideoPage(){

        $limitations = Limitation::where('level', Auth()->user()->level)->first();

        $call_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'call')
                            ->get();

        $receive_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'receive')
                            ->get();

        $call_acess = Recorder::where('from', Auth()->user()->id)
                              ->where('type', 'call')
                              ->where('status', 'TRUE')
                              ->first();

        $receive_acess = Recorder::where('from', Auth()->user()->id)
                              ->where('type', 'receive')
                              ->where('status', 'TRUE')
                              ->first();

        $not_completed = Recorder::where('from', Auth()->user()->id)
                                 ->where('status', '!=', 'TRUE')
                                 ->whereNotNull('to')
                                 ->first();
        $user = null;
        if($not_completed){
            $user = User::where('id', $not_completed->from)->first();
        }
        return view('video.video',compact('limitations','call_recorder','receive_recorder', 'call_acess', 'receive_acess','not_completed','user'));   
    }


    // CreateCall Page.
    public function CreateCall($UID, $Gender){

        $limitations = Limitation::where('level', Auth()->user()->level)->first();

        $calls_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'call')
                            ->get();

        $call_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'call')
                            ->where('status', 'FALSE')
                            ->get();

        $require;
        if ($Gender == 'both'){

            $require = Recorder::orderBy('id')
            ->where('type', 'receive')
            ->where('status', 'FALSE')
            ->where('level', Auth()->user()->level + 1)
            ->first();
        }else{
            $require = Recorder::orderBy('id')
            ->where('type', 'receive')
            ->where('status', 'FALSE')
            ->where('gender', $Gender)
            ->where('level', Auth()->user()->level + 1)
            ->first();
        }



        if ($limitations->call - count($calls_recorder) > 0) {


        if (count($call_recorder) > 0) {
            return redirect()->intended('/video-room')->with('error', 'Already Call Pending,');
        }else{

            if($require){
                $user = User::where('id', $require->from)->first();
                $email = $user->email;
                $email_mine = Auth()->user()->email;


                        DB::table('recorders')
                        ->where('id', $require->id)
                        ->update([
                            'to' => Auth()->user()->id,
                            'status' => 'PENDING',
                        ]);


                    Mail::raw('Welcome to ' . session('Seo')->meta_title . ': ' .'Kindly Join This Meeting: ' .session('Seo')->meta_website .'/video-room/' .$require->id . '/' .$user->identifier, function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Talaka Calling');
                    });

                    Mail::raw('Welcome to ' . session('Seo')->meta_title . ': ' .'Kindly Join This Meeting: ' .session('Seo')->meta_website .'/video-room/' .$require->id . '/' .$user->identifier, function ($message) use ($email_mine) {
                        $message->to($email_mine)
                            ->subject('Talaka Online');
                    });

                    return redirect()->intended('/')->with('success', 'Please Check Your Mail.');

            }else{
                       DB::table('recorders')
                        ->insert([
                        'from' => Auth::user()->id,
                        'to' => '',
                        'status' => 'FALSE',
                        'type' => 'call',
                        'gender' => $Gender,
                        'level' => Auth()->user()->level,
                        'created_at' => Carbon::now(),
                        ]);

                    return redirect()->intended('/')->with('success', 'You Now In Pending');
            }


        }





        }else{
            return redirect()->intended('/')->with('error', 'Access Denied!');
        } 
    }



    // CreateCall Page.
    public function CreateReceive($UID, $Gender){

        $limitations = Limitation::where('level', Auth()->user()->level)->first();

        $calls_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'receive')
                            ->get();

        $call_recorder = Recorder::where('from', Auth()->user()->id)
                            ->where('type', 'receive')
                            ->where('status', 'FALSE')
                            ->get();

        $require;
        if ($Gender == 'both'){

            $require = Recorder::orderBy('id')
            ->where('from', Auth()->user()->id)
            ->where('type', 'call')
            ->where('status', 'FALSE')
            ->where('level', Auth()->user()->level - 1)
            ->first();
        }else{
            $require = Recorder::orderBy('id')
            ->where('from', Auth()->user()->id)
            ->where('type', 'call')
            ->where('status', 'FALSE')
            ->where('gender', $Gender)
            ->where('level', Auth()->user()->level - 1)
            ->first();
        }

           

        

        if ($limitations->call - count($calls_recorder) > 0) {


        if (count($call_recorder) > 0) {
            return redirect()->intended('/video-room')->with('error', 'Already Online Pending,');
        }else{

            if($require){
                $user = User::where('id', $require->from)->first();

                        DB::table('recorders')
                        ->where('id', $require->id)
                        ->update([
                            'to' => Auth()->user()->id,
                            'status' => 'PENDING',
                        ]);

                        Mail::raw('Welcome to, ' . session('Seo')->meta_title . ': ' .'\nKindly Join This Meeting: ' .session('Seo')->meta_website .'/video-room/' .$require->id . '/' .$user->identifier, function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Talaka Online');
                    });

                    return redirect()->intended('/')->with('success', 'Please Check Your Mail.');

            }else{
                       DB::table('recorders')
                        ->insert([
                        'from' => Auth::user()->id,
                        'to' => '',
                        'status' => 'FALSE',
                        'type' => 'receive',
                        'gender' => $Gender,
                        'level' => Auth()->user()->level,
                        'created_at' => Carbon::now(),
                        ]);

                    return redirect()->intended('/')->with('success', 'You Now In Pending');
            }


        }





        }else{
            return redirect()->intended('/')->with('error', 'Access Denied!');
        } 

    }

public function Room() {
    $id = Recorder::orderBy('id')
        ->where('status', 'PENDING')
        ->where(function($query) {
            $query->where('from', Auth()->user()->id)
                ->orWhere('to', Auth()->user()->id);
        })
        ->where(function($query) {
            $query->whereNotNull('from')
                ->orWhereNotNull('to');
        })
        ->first();

    $Identifier = null;

    $user = null; // Initialize $user variable
    $me = null;

    if($id){
        $Identifier = User::where('id',$id->from)->first();
        if($id->from == Auth()->user()->id){
            $user = User::where('id', $id->to)->first();
            $me =  User::where('id', $id->from)->first();
        }

        if($id->to == Auth()->user()->id){
            $user = User::where('id', $id->from)->first();
            $me =  User::where('id', $id->to)->first();
        }

        return view('video.live', compact('id', 'user', 'Identifier', 'me'));
    }else{
        return redirect()->intended('/')->with('error', 'Access Denied!');
    }

    
}


    // Reminder.
    public function Reminder($ID, $Email){
        $record = Recorder::where('id',$ID)->first();
        $Identifier = User::where('id',$record->from)->first();

        Mail::raw('Welcome to, ' . session('Seo')->meta_title . ': ' .'Kindly Join This Meeting: ' .session('Seo')->meta_website .'/video-room/' .$ID . '/' .$Identifier->identifier, function ($message) use ($Email) {
                        $message->to($Email)
                            ->subject('Talaka Reminder');
        });

        return redirect()->intended('/')->with('success', 'Reminder Send Successfully.');
   
    }


    //  let rec_id, from, to, accent, verbs, polite;.
    public function Result(Request $request){

        $record = Recorder::where('id', $request->input('ID') )->first();
        $user = User::where('id', $record->to)->first();
        $email = $user->email;

        DB::table('recorders')
            ->where('id', $request->input('ID') )
            ->update([
                'status' => 'TRUE',
            ]);

        DB::table('rates')
            ->insert([
                'from' => $request->input('From'),
                'to' => $request->input('To'),
                'accent' => $request->input('Accent'),
                'verbs' => $request->input('Verbs'),
                'politely' => $request->input('Polite'),
                'type' => $record->type,
                'created_at' => Carbon::now(),
                ]);


        Mail::raw('Welcome to, ' . session('Seo')->meta_title . ': ' .'Last Meeting Rates: Accent['. $request->input('Accent') .'/5]' .' |Verbs['. $request->input('Verbs') .'/5]'.' |Politely['. $request->input('Polite') .'/5]', function ($message) use ($email) {
        $message->to($email)
                ->subject('Talaka Rate');
        });

        return redirect()->intended('/video-room')->with('success', 'Thanks.');
   
    }



    }