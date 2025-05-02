<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Extra\ProfileController;
use App\Http\Middleware\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::post('/update/referral', [ProfileController::class, 'UpdateReferral'])->name('update.referral');
*/

Route::middleware(['main', User::class, 'alert'])->group(function () {

Route::namespace('App\Http\Controllers\Frontend')->group(function(){

Route::get('/faucets', [PagesController::class, 'Faucets'])->name('faucets.home');
Route::get('/faucet/{Crypto}', [PagesController::class, 'FaucetPage'])->where('Crypto', '[a-z]+')->name('faucet.page');


Route::middleware(['validator','throttle:6,1'])->group(function () {
Route::post('send', [MainController::class, 'FaucetSend'])->name('faucet.send');
});


Route::middleware(['validator','throttle:1,1'])->group(function () {
Route::post('/request/payout', [ProfileController::class, 'RequestPayout'])->name('request.payout');
Route::post('/bonus/claim', [MainController::class, 'ClaimBonus'])->name('bonus.claim');
});

Route::middleware(['throttle:4,1'])->group(function () {
    Route::get('/shortlink/checker/{Hasher}', [MainController::class, 'ShortlinkChecker'])
        ->where('Hasher', '[a-zA-Z0-9]+')
        ->name('shortlink.page.task.end');
    Route::get('/shortlink/start', [MainController::class, 'ShortlinkTaskStart'])
        ->name('shortlink.task.start');
    Route::get('/send-verify', [PagesController::class, 'SendVerify']);
    Route::post('/update/payout', [ProfileController::class, 'UpdatePayout'])->name('update.payout');
});

Route::middleware(['throttle:1,1'])->group(function () {
Route::post('/user/profile/store/password', [ProfileController::class, 'Password'])->name('user.profile.update.password');
});

Route::get('/shortlink/{Crypto}', [PagesController::class, 'ShortlinkPage'])
    ->where('Crypto', '[a-z]+')
    ->name('shortlink.page');

Route::get('/shortlink/{Crypto}/{ID}', [MainController::class, 'ShortlinkTaskPage'])
    ->where('Crypto', '[a-z]+')
    ->where(['ID' => '[0-9]+'])
    ->name('shortlink.page.task');

Route::post('/session', [MainController::class, 'Session'])->name('session');

Route::get('/verify', [PagesController::class, 'Verification'])->name('verify');

});
});
