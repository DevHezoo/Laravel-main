<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Extra\SignUpController;
use App\Http\Controllers\Extra\SignInController;
use App\Http\Controllers\Extra\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::get('/alert', [PagesController::class, 'Alert'])->name('alert');
*/
// Check if user Loged in using : Auth, if used role : user
Route::middleware(['main', 'alert'])->group(function () {

Route::namespace('App\Http\Controllers\Frontend')->group(function(){

Route::get('/', [MainController::class, 'Home'])->name('home');

Route::middleware(['guest','validator'])->group(function () {
	Route::middleware(['throttle:2,1'])->group(function () {	
		Route::post('login', [SignInController::class, 'Loged'])->name('login');
	});
});

Route::middleware('auth')->group(function () {
Route::post('logout', [SignInController::class, 'LogOut'])->name('logout');
Route::get('/profile', [PagesController::class, 'Profile'])->name('profile');

Route::get('/bonus', [PagesController::class, 'Bonus'])->name('bonus');

Route::middleware(['throttle:3,1'])->group(function () {
    Route::get('/prize/{Code}', [PagesController::class, 'Prize'])
        ->where('Code', '[a-zA-Z0-9]+')
        ->name('prize');
});

Route::get('/test1', [PagesController::class, 'Test1']);
Route::get('/test2', [PagesController::class, 'Test2']);
Route::get('/test3', [PagesController::class, 'Test3']);
Route::get('/test4', [PagesController::class, 'Test4']);
Route::get('/test5', [PagesController::class, 'Test5']);
});

Route::get('/log', [PagesController::class, 'Log'])->name('log');

Route::get('/privacy', [PagesController::class, 'Privacy'])->name('privacy');

Route::get('/cookie', [PagesController::class, 'Cookie'])->name('cookie');

Route::get('/contact', [PagesController::class, 'Contact'])->name('contact');

Route::get('/start', [PagesController::class, 'Start'])->name('start');


Route::get('/tutorials', [PagesController::class, 'Tutorial'])->name('tutorial');

Route::post('/change-language/{locale}', [MainController::class, 'changeLanguage'])->name('change.language');

Route::middleware(['validator','throttle:1,1'])->group(function () {
	Route::post('/contact/send', [ContactController::class, 'Contact'])->name('contact.send');
});

});
});