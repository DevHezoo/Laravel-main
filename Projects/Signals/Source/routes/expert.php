<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Backend\Expert\ExpertController;
use App\Http\Controllers\Backend\Expert\SignalsController;


use App\Http\Middleware\Expert;
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

Route::middleware(['main', Expert::class])->group(function () {

Route::namespace('App\Http\Controllers\Backend\Expert')->group(function(){
Route::get('/expert', [ExpertController::class, 'ExpertDashboard'])->name('expert.dashboard');


// All Signals Guest
Route::get('/expert/view/signals_guest', [SignalsController::class, 'ViewAllGuestsSignals'])->name('expert.view.guests.signals');
//View Signal
Route::get('/expert/view/signal_guest/{ID}', [SignalsController::class, 'ViewGuestSignal'])->name('expert.view.guest.signal');
// Edit Signal
Route::post('/expert/edit/signal_guest/{ID}', [SignalsController::class, 'EditGuestSignal'])->name('expert.edit.guest.signal');
//Delete Signal
Route::get('/expert/delete/signal_guest/{ID}', [SignalsController::class, 'DeleteGuestSignal'])->name('expert.delete.guest.signal');
// New Signal Page
Route::get('/expert/new/signal_guest', [SignalsController::class, 'NewGuestSignal'])->name('expert.new.guest.signal');
// create Signal
Route::post('/expert/new/signal_guest/create' , [SignalsController::class, 'AddGuestSignal'])->name('expert.create.new.guest.signal');

// All Signals User
Route::get('/expert/view/signals_user', [SignalsController::class, 'ViewAllUsersSignals'])->name('expert.view.users.signals');
//View Signal
Route::get('/expert/view/signal_user/{ID}', [SignalsController::class, 'ViewUserSignal'])->name('expert.view.user.signal');
// Edit Signal
Route::post('/expert/edit/signal_user/{ID}', [SignalsController::class, 'EditUserSignal'])->name('expert.edit.user.signal');
//Delete Signal
Route::get('/expert/delete/signal_user/{ID}', [SignalsController::class, 'DeleteUserSignal'])->name('expert.delete.user.signal');
// New Signal Page
Route::get('/expert/new/signal_user', [SignalsController::class, 'NewUserSignal'])->name('expert.new.user.signal');
// create Signal
Route::post('/expert/new/signal_user/create' , [SignalsController::class, 'AddUserSignal'])->name('expert.create.new.user.signal');

// All Signals Premium
Route::get('/expert/view/signals_premium', [SignalsController::class, 'ViewAllPremiumsSignals'])->name('expert.view.premiums.signals');
//View Signal
Route::get('/expert/view/signal_premium/{ID}', [SignalsController::class, 'ViewPremiumSignal'])->name('expert.view.premium.signal');
// Edit Signal
Route::post('/expert/edit/signal_premium/{ID}', [SignalsController::class, 'EditPremiumSignal'])->name('expert.edit.premium.signal');
//Delete Signal
Route::get('/expert/delete/signal_premium/{ID}', [SignalsController::class, 'DeletePremiumSignal'])->name('expert.delete.premium.signal');
// New Signal Page
Route::get('/expert/new/signal_premium', [SignalsController::class, 'NewPremiumSignal'])->name('expert.new.premium.signal');
// create Signal
Route::post('/expert/new/signal_premium/create' , [SignalsController::class, 'AddPremiumSignal'])->name('expert.create.new.premium.signal');

//Delete Signal Comment
Route::post('/expert/delete/signal/comment/{ID}' , [SignalsController::class, 'DeleteSignalComment'])->name('expert.delete.signal.comment');

});

});
