<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Extra\NewsController;
use App\Http\Controllers\Extra\ContactController;
use App\Http\Controllers\Extra\ProfileController;
use App\Http\Controllers\Extra\SignalController;

use App\Http\Middleware\User;
use App\Http\Middleware\Premium;
use App\Http\Middleware\Expert;
use App\Http\Middleware\Admin;
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
Route::post('/contact/submit', [ContactController::class, 'Contact'])->name('contact.submit');

Route::middleware('auth')->group(function () {

Route::post('comment/{ID}', [NewsController::class, 'Comment'])->name('comment.blog');

Route::post('comment/signal/{ID}', [SignalController::class, 'Comment'])->name('comment.signal');

Route::post('/user/profile/store/userinformation', [ProfileController::class, 'Information'])->name('user.profile.update.information');
Route::post('/user/profile/store/userpassword', [ProfileController::class, 'Password'])->name('user.profile.update.password');

});


// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Routes for all authenticated users

    // Routes for specific roles within the authenticated users
    Route::middleware(User::class)->group(function () {
        Route::get('/signalv2/view/{ID}', [SignalController::class, 'Signal']);
    });

    Route::middleware(Premium::class)->group(function () {
        Route::get('/signalv3/view/{ID}', [SignalController::class, 'Signal']);
    });

    Route::middleware(Expert::class)->group(function () {
        Route::get('/signalv4/view/{ID}', [SignalController::class, 'Signal']);
    });

    Route::middleware(Admin::class)->group(function () {
        Route::get('/signalv5/view/{ID}', [SignalController::class, 'Signal']);
    });
});

Route::get('/signalv1/view/{ID}', [SignalController::class, 'Signal']);

});
});