<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\UserController;
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

// Dashboard
Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard');
    })->name('home');
    Route::resource('user', UserController::class);

    // Timesheet Routes
    Route::resource('timesheet', TimesheetController::class);
    Route::get('timesheet-table', [TimesheetController::class, 'table'])->name('timesheet.table');

    // Project Routes
    Route::resource('project', ProjectController::class);

    // Application Routes
    Route::resource('application', ApplicationController::class);
});
