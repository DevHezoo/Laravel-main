<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;



// Check if user Loged in using : Auth, if used role : user
Route::middleware(['auth','role:user'])->group(function () {



Route::namespace('App\Http\Controllers\Frontend')->group(function(){

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

// Order An Items's
Route::post('/stripe/order', [CartController::class, 'StripeOrder'])->name('stripe.order');
Route::post('/cash/order', [CartController::class, 'CashOrder'])->name('cash.order');

// Wishlist

// View Wishlist
Route::get('/wishlist', [CartController::class, 'Wishlist'])->name('wishlist.view');
// Add Specific Product By ID
Route::post('/wishlist/add/{ProductID}', [CartController::class, 'WishlistAdd'])->name('wishlist.add');
// Remove Specific Product By ID
Route::post('/wishlist/remove/{ProductID}', [CartController::class, 'WishlistRemove'])->name('wishlist.remove');


// Compare

// View Compare
Route::get('/compare', [CartController::class, 'Compare'])->name('compare.view');
// Add Specific Product By ID
Route::post('/compare/add/{ProductID}', [CartController::class, 'CompareAdd'])->name('compare.add');
// Remove Specific Product By ID
Route::post('/compare/remove/{ProductID}', [CartController::class, 'CompareRemove'])->name('compare.remove');


}); //Group Frontend End




Route::namespace('App\Http\Controllers\User')->group(function(){

Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

Route::post('/user/profile/store/userinformation', [UserController::class, 'UserInfo'])->name('user.profile.update.information');

Route::post('/user/profile/store/userpassword', [UserController::class, 'UserPass'])->name('user.profile.update.password');

// Order View / Cancel / Return
Route::get('/order/view/{Order_Number}', [UserController::class, 'UserOrder'])->name('user.order');
Route::get('/order/cancel/{Order_Number}', [UserController::class, 'UserOrderCancel'])->name('user.order.cancel');
Route::get('/order/reurn/{Order_Number}', [UserController::class, 'UserOrderReturn'])->name('user.order.return');


// Tracking Group
// Get req: to get infos
// Post req: To send infos
Route::get('/track', [UserController::class, 'Track'])->name('track');
Route::get('/track/order/{Order_Number}', [UserController::class, 'TrackOrder'])->name('track.order');

// Ticket Group
Route::get('/ticket/new', [UserController::class, 'TicketNew'])->name('ticket.new');
Route::get('/ticket/view/{Ticket_Number}', [UserController::class, 'TicketView'])->name('ticket.view');

// New Ticket Submit
Route::post('/ticket/submit', [UserController::class, 'TicketSubmit'])->name('ticket.submit');

}); //Group User End





}); //Group Middleware End