<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['confirm' => false, 'reset' => false]);
Route::view('/', 'index')->name('index');
Route::resource('task_statuses', TaskStatusController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy');
Route::resource('tasks', TaskController::class);
Route::resource('labels', LabelController::class)
    ->only('index', 'create', 'store', 'edit', 'update', 'destroy');
