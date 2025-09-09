<?php

use App\Http\Controllers\Api\TimesheetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/timesheets', [TimesheetController::class, 'index']);
Route::get('/timesheets/{id}', [TimesheetController::class, 'show']);
Route::post('/timesheets', [TimesheetController::class, 'store']);
Route::put('/timesheets/{id}', [TimesheetController::class, 'update']);
Route::delete('/timesheets/{id}', [TimesheetController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
