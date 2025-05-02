<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\AcountsController;
use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers\Backend\Admin')->group(function(){
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

}); //Group Backend End


// Check if user Loged in using : Auth, if used role : user
Route::middleware(['auth','role:admin'])->group(function () {

Route::namespace('App\Http\Controllers\Backend\Admin')->group(function(){

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');


// Users
Route::get('/admin/view/users', [AcountsController::class, 'AllUsers'])->name('admin.view.users');
Route::get('/admin/delete/user/{ID}', [AcountsController::class, 'DeleteUser'])->name('admin.delete.user');

Route::get('/admin/view/user/{ID}', [AcountsController::class, 'ViewUser'])->name('admin.view.user');

Route::post('/admin/edit_info/user/{ID}', [AcountsController::class, 'EditUser'])->name('admin.edit.user.info');
Route::post('/admin/edit_pass/user/{ID}', [AcountsController::class, 'EditUserPass'])->name('admin.edit.user.pass');
Route::post('/admin/add/user', [AcountsController::class, 'AddUser'])->name('admin.add.user');
Route::get('/admin/new/user', [AcountsController::class, 'NewUser'])->name('admin.new.user');


// Vendors
Route::get('/admin/view/vendors', [AcountsController::class, 'AllVendors'])->name('admin.view.vendors');
Route::get('/admin/delete/vendor/{ID}', [AcountsController::class, 'DeleteVendor'])->name('admin.delete.vendor');

Route::get('/admin/view/vendor/{ID}', [AcountsController::class, 'ViewVendor'])->name('admin.view.vendor');

Route::post('/admin/edit_info/vendor/{ID}', [AcountsController::class, 'EditVendor'])->name('admin.edit.vendor.info');
Route::post('/admin/edit_pass/vendor/{ID}', [AcountsController::class, 'EditVendorPass'])->name('admin.edit.vendor.pass');
Route::post('/admin/add/vendor', [AcountsController::class, 'AddVendor'])->name('admin.add.vendor');
Route::get('/admin/new/vendor', [AcountsController::class, 'NewVendor'])->name('admin.new.vendor');

// Deliveries
Route::get('/admin/view/deliveries', [AcountsController::class, 'AllDeliveries'])->name('admin.view.deliveries');
Route::get('/admin/delete/delivery/{ID}', [AcountsController::class, 'DeleteDelivery'])->name('admin.delete.delivery');

Route::get('/admin/view/delivery/{ID}', [AcountsController::class, 'ViewDelivery'])->name('admin.view.delivery');

Route::post('/admin/edit_info/delivery/{ID}', [AcountsController::class, 'EditDelivery'])->name('admin.edit.delivery.info');
Route::post('/admin/edit_pass/delivery/{ID}', [AcountsController::class, 'EditDeliveryPass'])->name('admin.edit.delivery.pass');
Route::post('/admin/add/delivery', [AcountsController::class, 'AddDelivery'])->name('admin.add.delivery');
Route::get('/admin/new/delivery', [AcountsController::class, 'NewDelivery'])->name('admin.new.delivery');


// Admins
Route::get('/admin/view/admins', [AcountsController::class, 'AllAdmins'])->name('admin.view.admins');
Route::get('/admin/delete/admin/{ID}', [AcountsController::class, 'DeleteAdmin'])->name('admin.delete.admin');

Route::get('/admin/view/admin/{ID}', [AcountsController::class, 'ViewAdmin'])->name('admin.view.admin');

Route::post('/admin/edit_info/admin/{ID}', [AcountsController::class, 'EditAdmin'])->name('admin.edit.admin.info');
Route::post('/admin/edit_pass/admin/{ID}', [AcountsController::class, 'EditAdminPass'])->name('admin.edit.admin.pass');
Route::post('/admin/add/admin', [AcountsController::class, 'AddAdmin'])->name('admin.add.admin');
Route::get('/admin/new/admin', [AcountsController::class, 'NewAdmin'])->name('admin.new.admin');


}); //Group Backend End



}); //Group Middleware End