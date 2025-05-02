<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Extra\SignUpController;
use App\Http\Controllers\Extra\SignInController;

use App\Http\Controllers\Backend\Admin\AdminController;
// use App\Http\Controllers\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Auth\EmailVerificationNotificationController;
// use App\Http\Controllers\Auth\EmailVerificationPromptController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Check if user Loged in using : Auth, if used role : user
Route::middleware(['main'])->group(function () {

Route::namespace('App\Http\Controllers\Frontend')->group(function(){
Route::get('/', [MainController::class, 'Home'])->name('home');

Route::get('/live', [PagesController::class, 'Live'])->name('live');
Route::get('/price', [PagesController::class, 'Price'])->name('price');
Route::get('/news', [PagesController::class, 'News'])->name('news');
Route::get('/blog/view/{ID}', [PagesController::class, 'Blog'])->name('blog.view');
Route::get('/contact', [PagesController::class, 'Contact'])->name('contact');

Route::middleware('guest')->group(function () {
Route::get('/login', [SignInController::class, 'SignIn'])->name('login');
Route::post('login', [SignInController::class, 'Loged']);

Route::get('/register', [SignUpController::class, 'SignUp'])->name('register');
Route::post('register', [SignUpController::class, 'SignedUp']);
});

Route::middleware('auth')->group(function () {
Route::post('logout', [SignInController::class, 'LogOut'])->name('logout');
Route::get('/profile', [PagesController::class, 'Profile'])->name('profile');
});


Route::post('/change-language/{locale}', [MainController::class, 'changeLanguage'])->name('change.language');
});





});
