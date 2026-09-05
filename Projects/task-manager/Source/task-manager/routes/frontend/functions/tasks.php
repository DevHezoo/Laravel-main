<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Functions\TasksController;

/*
|--------------------------------------------------------------------------
| Tasks Routes
|--------------------------------------------------------------------------
*/

Route::post('/tasks/reorder', [TasksController::class, 'reorder'])->name('tasks.reorder');
Route::resource('tasks', TasksController::class)->except(['show']);