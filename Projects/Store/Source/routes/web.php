<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\Frontend\ProductController;
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

Route::namespace('App\Http\Controllers\Frontend')->group(function(){

Route::get('/', [MainController::class, 'Home'])->name('home');

Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');



// Check if user Loged in using : Auth, if used role : user
Route::middleware(['guest'])->group(function () {
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
// New Contact Submit
Route::post('/contact/submit', [MainController::class, 'ContactSubmit'])->name('contact.submit');
});

Route::get('/shop/product/details/{ProductCode}', [ProductController::class, 'ProductViewer'])->name('shop.product.details');


// Handle All Cart Routes
//cart.add, cart.remove, cart.count Get, get.cart Get, cart.update ,cart.content, cart.update.item

Route::post('/add-to-cart', [CartController::class, 'AddToCart'])->name('cart.add');
Route::post('/cart/remove/{rowId}', [CartController::class, 'RemoveFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'UpdateCartItem'])->name('cart.update');
Route::post('/cart/update/item', [CartController::class, 'UpdateCart'])->name('cart.update.item');
Route::get('/cart/count', [CartController::class, 'GetCartCount'])->name('cart.count');
Route::get('/get-cart', [CartController::class, 'GetCartsItems'])->name('get.cart');
Route::get('/cart/content', [CartController::class, 'GetCartContent'])->name('cart.content');
Route::get('/cart', [CartController::class, 'Cart'])->name('cart');

// Blog Group
Route::get('/blog', [MainController::class, 'Blog'])->name('blog');
Route::get('/blog/view/{ID}', [MainController::class, 'BlogView'])->name('blog.view');

// Vendor Group 
Route::get('/vendor/{ID}', [MainController::class, 'VendorPage'])->name('vendor');
Route::get('/vendor/product/view/{ID}', [MainController::class, 'VendorProductView'])->name('vendor.product.view');

// Newsletter Group
Route::post('/newsletter/submit', [MainController::class, 'NewsletterSubmit'])->name('newsletter.submit');


Route::get('/test', [MainController::class, 'test']);

});



require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
