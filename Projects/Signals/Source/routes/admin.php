<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\AcountsController;
use App\Http\Controllers\Extra\ContactController;

use App\Http\Controllers\Backend\Admin\AdminProfileController;
use App\Http\Controllers\Backend\Admin\SettingsController;

use App\Http\Controllers\Backend\Admin\SignalsController;

use App\Http\Controllers\Backend\Admin\BlogsController;

use App\Http\Middleware\Admin;
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

Route::middleware(['main', Admin::class])->group(function () {

Route::namespace('App\Http\Controllers\Backend\Admin')->group(function(){
Route::get('/admin', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

// Users
Route::get('/admin/view/users', [AcountsController::class, 'AllUsers'])->name('admin.view.users');
Route::get('/admin/delete/user/{ID}', [AcountsController::class, 'DeleteUser'])->name('admin.delete.user');

Route::get('/admin/view/user/{ID}', [AcountsController::class, 'ViewUser'])->name('admin.view.user');

Route::post('/admin/edit_info/user/{ID}', [AcountsController::class, 'EditUser'])->name('admin.edit.user.info');
Route::post('/admin/edit_pass/user/{ID}', [AcountsController::class, 'EditUserPass'])->name('admin.edit.user.pass');
Route::post('/admin/add/user', [AcountsController::class, 'AddUser'])->name('admin.add.user');
Route::get('/admin/new/user', [AcountsController::class, 'NewUser'])->name('admin.new.user');


// Premium
Route::get('/admin/view/premiums', [AcountsController::class, 'AllPremiums'])->name('admin.view.premiums');
Route::get('/admin/delete/premium/{ID}', [AcountsController::class, 'DeletePremium'])->name('admin.delete.premium');

Route::get('/admin/view/premium/{ID}', [AcountsController::class, 'ViewPremium'])->name('admin.view.premium');

Route::post('/admin/edit_info/premium/{ID}', [AcountsController::class, 'EditPremium'])->name('admin.edit.premium.info');
Route::post('/admin/edit_pass/premium/{ID}', [AcountsController::class, 'EditPremiumPass'])->name('admin.edit.premium.pass');
Route::post('/admin/add/premium', [AcountsController::class, 'AddPremium'])->name('admin.add.premium');
Route::get('/admin/new/premium', [AcountsController::class, 'NewPremium'])->name('admin.new.premium');


// Expert
Route::get('/admin/view/experts', [AcountsController::class, 'AllExperts'])->name('admin.view.experts');
Route::get('/admin/delete/expert/{ID}', [AcountsController::class, 'DeleteExpert'])->name('admin.delete.expert');

Route::get('/admin/view/expert/{ID}', [AcountsController::class, 'ViewExpert'])->name('admin.view.expert');

Route::post('/admin/edit_info/expert/{ID}', [AcountsController::class, 'EditExpert'])->name('admin.edit.expert.info');
Route::post('/admin/edit_pass/expert/{ID}', [AcountsController::class, 'EditExpertPass'])->name('admin.edit.expert.pass');
Route::post('/admin/add/expert', [AcountsController::class, 'AddExpert'])->name('admin.add.expert');
Route::get('/admin/new/expert', [AcountsController::class, 'NewExpert'])->name('admin.new.expert');


// Admins
Route::get('/admin/view/admins', [AcountsController::class, 'AllAdmins'])->name('admin.view.admins');
Route::get('/admin/delete/admin/{ID}', [AcountsController::class, 'DeleteAdmin'])->name('admin.delete.admin');

Route::get('/admin/view/admin/{ID}', [AcountsController::class, 'ViewAdmin'])->name('admin.view.admin');

Route::post('/admin/edit_info/admin/{ID}', [AcountsController::class, 'EditAdmin'])->name('admin.edit.admin.info');
Route::post('/admin/edit_pass/admin/{ID}', [AcountsController::class, 'EditAdminPass'])->name('admin.edit.admin.pass');
Route::post('/admin/add/admin', [AcountsController::class, 'AddAdmin'])->name('admin.add.admin');
Route::get('/admin/new/admin', [AcountsController::class, 'NewAdmin'])->name('admin.new.admin');


//All Contact
Route::get('/admin/view/contacts', [ContactController::class, 'ViewAllContacts'])->name('view.contacts');

//View Contact
Route::get('/admin/view/contact/{ID}', [ContactController::class, 'ViewContact'])->name('view.contact');

//Delete Contact
Route::get('/admin/delete/contact/{ID}', [ContactController::class, 'DeleteContact'])->name('delete.contact');

//Delete All Contact
Route::get('/admin/delete/all/contact', [ContactController::class, 'DeleteContacts'])->name('delete.contacts');

//Profile Setting
Route::get('/admin/profile' , [AdminProfileController::class, 'ProfileAdmin'])->name('profile.admin');
//Delete Admin
Route::get('/admin/delete/admin' , [AdminProfileController::class, 'DeleteAdmin'])->name('delete.me');
//Update Admin
Route::post('/admin/update/admin-info' , [AdminProfileController::class, 'EditAdmin'])->name('update.my.info');
Route::post('/admin/update/admin-pass' , [AdminProfileController::class, 'AdminPass'])->name('update.my.pass');

//Website Setting
Route::get('/admin/settings' , [SettingsController::class, 'AdminSettings'])->name('settings.admin');
//Update Setting
Route::post('/admin/update/website-info' , [SettingsController::class, 'EditWebsite'])->name('update.website.info');


// All Signals Guest
Route::get('/admin/view/signals_guest', [SignalsController::class, 'ViewAllGuestsSignals'])->name('view.guests.signals');
//View Signal
Route::get('/admin/view/signal_guest/{ID}', [SignalsController::class, 'ViewGuestSignal'])->name('view.guest.signal');
// Edit Signal
Route::post('/admin/edit/signal_guest/{ID}', [SignalsController::class, 'EditGuestSignal'])->name('admin.edit.guest.signal');
//Delete Signal
Route::get('/admin/delete/signal_guest/{ID}', [SignalsController::class, 'DeleteGuestSignal'])->name('delete.guest.signal');
// New Signal Page
Route::get('/admin/new/signal_guest', [SignalsController::class, 'NewGuestSignal'])->name('admin.new.guest.signal');
// create Signal
Route::post('/admin/new/signal_guest/create' , [SignalsController::class, 'AddGuestSignal'])->name('admin.create.new.guest.signal');

// All Signals User
Route::get('/admin/view/signals_user', [SignalsController::class, 'ViewAllUsersSignals'])->name('view.users.signals');
//View Signal
Route::get('/admin/view/signal_user/{ID}', [SignalsController::class, 'ViewUserSignal'])->name('view.user.signal');
// Edit Signal
Route::post('/admin/edit/signal_user/{ID}', [SignalsController::class, 'EditUserSignal'])->name('admin.edit.user.signal');
//Delete Signal
Route::get('/admin/delete/signal_user/{ID}', [SignalsController::class, 'DeleteUserSignal'])->name('delete.user.signal');
// New Signal Page
Route::get('/admin/new/signal_user', [SignalsController::class, 'NewUserSignal'])->name('admin.new.user.signal');
// create Signal
Route::post('/admin/new/signal_user/create' , [SignalsController::class, 'AddUserSignal'])->name('admin.create.new.user.signal');


// All Signals Premium
Route::get('/admin/view/signals_premium', [SignalsController::class, 'ViewAllPremiumsSignals'])->name('view.premiums.signals');
//View Signal
Route::get('/admin/view/signal_premium/{ID}', [SignalsController::class, 'ViewPremiumSignal'])->name('view.premium.signal');
// Edit Signal
Route::post('/admin/edit/signal_premium/{ID}', [SignalsController::class, 'EditPremiumSignal'])->name('admin.edit.premium.signal');
//Delete Signal
Route::get('/admin/delete/signal_premium/{ID}', [SignalsController::class, 'DeletePremiumSignal'])->name('delete.premium.signal');
// New Signal Page
Route::get('/admin/new/signal_premium', [SignalsController::class, 'NewPremiumSignal'])->name('admin.new.premium.signal');
// create Signal
Route::post('/admin/new/signal_premium/create' , [SignalsController::class, 'AddPremiumSignal'])->name('admin.create.new.premium.signal');



// All Blogs 
Route::get('/admin/view/blogs', [BlogsController::class, 'ViewAllBlogs'])->name('view.blogs');
//View Signal
Route::get('/admin/view/blog/{ID}', [BlogsController::class, 'ViewBlog'])->name('view.blog');
// Edit Signal
Route::post('/admin/edit/blog/{ID}', [BlogsController::class, 'EditBlog'])->name('admin.edit.blog');
//Delete Signal
Route::get('/admin/delete/blog/{ID}', [BlogsController::class, 'DeleteBlog'])->name('delete.blog');
// New Signal Page
Route::get('/admin/new/blog', [BlogsController::class, 'NewBlog'])->name('admin.new.blog');
// create Signal
Route::post('/admin/new/blog/create' , [BlogsController::class, 'AddBlog'])->name('admin.create.new.blog');





//Delete Signal Comment
Route::post('/admin/delete/signal/comment/{ID}' , [SignalsController::class, 'DeleteSignalComment'])->name('admin.delete.signal.comment');

//Delete blog Comment
Route::post('/admin/delete/blog/comment/{ID}' , [BlogsController::class, 'DeleteBlogComment'])->name('admin.delete.blog.comment');

});

});
