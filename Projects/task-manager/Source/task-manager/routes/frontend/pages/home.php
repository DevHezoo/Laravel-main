<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Functions\TasksController;

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [TasksController::class, 'index'])->name('home');
