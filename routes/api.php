<?php

use App\Http\Controllers\API\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DriverController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('driver_login',[DriverController::class,'loginDriver']);


Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('driver_details',[DriverController::class,'driverDetails']);
    Route::get('driver_logout',[DriverController::class,'driverlogout']);

    // Dashboard Controller
    Route::get('driver_allorders',[DashboardController::class,'allOrders']);
    Route::get('driver_deliverdOrders',[DashboardController::class,'deliverdOrders']);
    Route::post('driver_collectionjobs',[DashboardController::class,'collectionjobs']);
    Route::post('driver_quick_delivery',[DashboardController::class,'quick_delivery']);
    // Route::get('logout',[DriverController::class,'logout']);
    // Dashboard Controller
});
