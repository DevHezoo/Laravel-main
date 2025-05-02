<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

          <form class="text-start mt-4" method="POST" action="{{ route('verify') }}" role="form">
                              @csrf
                              <button class="btn btn-primary btn-sm" id="sendCodeButton" type="submit">Send Code</button>
                            </form> 
                            
                  <div class="col-4"><input class="form-control" type="tel" name="verify" placeholder="Verify" aria-label="Verify" /></div> 


*/

Route::middleware(['main'])->group(function () {
Route::namespace('App\Http\Controllers\Frontend')->group(function(){

    Route::get('/', [PagesController::class, 'Home'])->name('home');
    Route::post('subscribe', [PagesController::class, 'Subscription'])->name('subscribe');
    Route::get('/contact', [PagesController::class, 'ContactPage'])->name('contact.page');
    Route::post('/contact/submit', [PagesController::class, 'Contact'])->name('contact');

    Route::get('/articles', function () {
        return redirect('/articles/1');
    });
    
    Route::get('/articles/{Page}', [PagesController::class, 'ArticlesPage'])->name('articles.page');

    Route::get('/article/{ID}', [PagesController::class, 'ArticlePage'])->name('article.page');
    
    Route::get('/live', [PagesController::class, 'LivePage'])->name('live.page');

    Route::get('/chat', [PagesController::class, 'ChatPage'])->name('chat.page');

Route::middleware(['guest'])->group(function () {

	Route::get('/sign-up', [PagesController::class, 'RegisterPage'])->name('register.page');
	Route::post('/register', [AuthController::class, 'Register'])->name('register');

    Route::get('/sign-in', [PagesController::class, 'LoginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'Login'])->name('login');

	// Route::post('verify', [AuthController::class, 'Verify'])->name('verify');
});


Route::middleware('auth')->group(function () {
Route::post('/logout', [AuthController::class, 'LogOut'])->name('logout');
Route::get('/profile', [PagesController::class, 'ProfilePage'])->name('profile.page');

Route::get('/quiz', [PagesController::class, 'QuizPage'])->name('quiz.page');
Route::post('/question', [MainController::class, 'Question'])->name('question');

Route::get('/video-room', [PagesController::class, 'VideoPage'])->name('video.page');

Route::post('/video-room/{UID}/{Gender}/receive', [PagesController::class, 'CreateReceive'])->name('create.receive');
Route::post('/video-room/{UID}/{Gender}/call', [PagesController::class, 'CreateCall'])->name('create.call');


Route::get('/video-room/{ID}/{UID}', [PagesController::class, 'Room']);

Route::post('/remind/{ID}/{Email}', [PagesController::class, 'Reminder'])->name('reminder');

 // public function Result($ID, $From, $To, $Accent, $Verbs, $Polite){
Route::post('/rates', [PagesController::class, 'Result']);

});


});

});