<?php

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

use App\Http\Controllers\Api\ParkingController;

Route::post('/vehicle-in', [ParkingController::class, 'vehicleIn']);
Route::post('/vehicle-out', [ParkingController::class, 'vehicleOut']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
