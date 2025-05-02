<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\PropertyController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProfileController;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Profile;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\PropertyControl;
use App\Http\Controllers\Backend\TypesController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ContactControl;
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



// Back-end
Route::namespace('App\Http\Controllers\Backend')->group(function(){

// Admin
Route::middleware(['auth','role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');

// 
    //All Users
    Route::get('/admin/view/users', [AdminController::class, 'ViewAllUsers'])->name('view.users');

    //View User
    Route::get('/admin/view/user/{ID}', [AdminController::class, 'ViewUser'])->name('view.user');

    //Delete User
    Route::get('/admin/delete/user/{ID}' , [AdminController::class, 'DeleteUser'])->name('delete.user');
    
    //Update User
    Route::post('/admin/update/user-info/{ID}' , [AdminController::class, 'EditUser'])->name('update.user.info');

    Route::post('/admin/update/user-pass/{ID}' , [AdminController::class, 'UserPass'])->name('update.user.pass');
// 
    //All Admins
    Route::get('/admin/view/admins', [AdminController::class, 'ViewAllAdmins'])->name('view.admins');

    //View admin
    Route::get('/admin/view/admin/{ID}', [AdminController::class, 'ViewAdmin'])->name('view.admin');

    //Delete admin
    Route::get('/admin/delete/admin/{ID}' , [AdminController::class, 'DeleteAdmin'])->name('delete.admin.user');
    
    //Update admin
    Route::post('/admin/update/admin-info/{ID}' , [AdminController::class, 'EditAdmin'])->name('update.admin.info');

    Route::post('/admin/update/admin-pass/{ID}' , [AdminController::class, 'AdminPass'])->name('update.admin.pass');
// 

    //Profile Setting
    Route::get('/admin/profile' , [Profile::class, 'ProfileAdmin'])->name('profile.admin');
    //Delete Admin
    Route::get('/admin/delete/admin' , [Profile::class, 'DeleteAdmin'])->name('delete.me');
    
    //Update Admin
    Route::post('/admin/update/admin-info' , [Profile::class, 'EditAdmin'])->name('update.my.info');

    Route::post('/admin/update/admin-pass' , [Profile::class, 'AdminPass'])->name('update.my.pass');

 // 

    //Website Setting
    Route::get('/admin/settings' , [SettingsController::class, 'AdminSettings'])->name('settings.admin');

    //Update Setting
    Route::post('/admin/update/website-info' , [SettingsController::class, 'EditWebsite'])->name('update.website.info');
 // 

//All Properities
    Route::get('/admin/view/properties', [PropertyControl::class, 'ViewAllProperties'])->name('view.properties');

    //View Property
    Route::get('/admin/view/property/{ID}', [PropertyControl::class, 'ViewProperty'])->name('view.property');

    //Add Property
    Route::get('/admin/add/property', [PropertyControl::class, 'NewProperty'])->name('new.property');

    //Delete Property
    Route::get('/admin/delete/property/{ID}' , [PropertyControl::class, 'DeleteProperty'])->name('delete.property');
    
    //Update Property
    Route::post('/admin/update/property-info/{ID}' , [PropertyControl::class, 'EditProperty'])->name('update.property.info');

    Route::post('/admin/add/property-info' , [PropertyControl::class, 'AddProperty'])->name('add.property.info');

//All Types
    Route::get('/admin/view/types', [TypesController::class, 'ViewAllTypes'])->name('view.types');

    //View Type
    Route::get('/admin/view/type/{ID}', [TypesController::class, 'ViewType'])->name('view.type');

    //Add Type
    Route::get('/admin/add/type', [TypesController::class, 'NewType'])->name('new.type');

    //Delete Type
    Route::get('/admin/delete/type/{ID}' , [TypesController::class, 'DeleteType'])->name('delete.type');
    
    //Update Type
    Route::post('/admin/update/types-info/{ID}' , [TypesController::class, 'EditType'])->name('update.type.info');

    Route::post('/admin/add/type-info' , [TypesController::class, 'AddType'])->name('add.type.info');

//All Orders
    Route::get('/admin/view/orders', [OrdersController::class, 'ViewAllOrders'])->name('view.orders');

    //View Order
    Route::get('/admin/view/order/{ID}', [OrdersController::class, 'ViewOrder'])->name('view.order');

    //Add Order
    Route::get('/admin/add/order', [OrdersController::class, 'NewOrder'])->name('new.order');

    //Delete Order
    Route::get('/admin/delete/order/{ID}' , [OrdersController::class, 'DeleteOrder'])->name('delete.order');
    
    //Update Order
    Route::post('/admin/update/order-info/{ID}' , [OrdersController::class, 'EditOrder'])->name('update.order.info');

    Route::post('/admin/add/order-info' , [OrdersController::class, 'AddOrder'])->name('add.order.info');

//All Contact
    Route::get('/admin/view/contacts', [ContactControl::class, 'ViewAllContacts'])->name('view.contacts');

    //View Contact
    Route::get('/admin/view/contact/{ID}', [ContactControl::class, 'ViewContact'])->name('view.contact');

    //Delete Contact
    Route::get('/admin/delete/contact/{ID}', [ContactControl::class, 'DeleteContact'])->name('delete.contact');

    //Delete All Contact
    Route::get('/admin/delete/all/contact', [ContactControl::class, 'DeleteContacts'])->name('delete.contacts');

});

Route::get('/admin', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
});


// Front-end
Route::namespace('App\Http\Controllers\Frontend')->group(function(){

Route::get('/', [MainController::class, 'Home'])->name('home');

Route::get('/properties', [PropertyController::class, 'Home'])->name('properties');

Route::get('/property/details/{PropertyID}', [PropertyController::class, 'PropertyPage'])->name('property.page');

// Check if user Loged in using : Auth, if used role : user
Route::middleware(['auth','role:user'])->group(function () {

Route::get('/order/details/{PropertyID}', [PropertyController::class, 'OrderPage'])->name('order.page');

Route::post('/order' , [PropertyController::class, 'Order'])->name('order');

Route::post('/check-room-availability', [BookingController::class, 'checkRoomAvailability']);

Route::get('/get-existing-checkin-dates', [BookingController::class, 'getExistingCheckinDates']);

Route::get('/get-existing-checkout-dates', [BookingController::class, 'getExistingCheckoutDates']);


Route::get('/profile', [ProfileController::class, 'Profile'])->name('profile');

Route::post('/user/profile/store/userinformation', [ProfileController::class, 'UserInfo'])->name('user.profile.update.information');

Route::post('/user/profile/store/userpassword', [ProfileController::class, 'UserPass'])->name('user.profile.update.password');

Route::get('/invoice/view/{InvoiceID}', [ProfileController::class, 'InvoiceInfo'])->name('invoice.info');

});

Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

Route::post('/contact/new', [ContactController::class, 'SaveContact'])->name('contact.save');

});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
