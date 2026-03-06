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
use App\Http\Controllers\Api\CameraController;

Route::post('/vehicle-in', [ParkingController::class, 'vehicleIn']);
Route::post('/vehicle-out', [ParkingController::class, 'vehicleOut']);

Route::prefix('camera')->group(function () {
    Route::get('test/{lane}', [CameraController::class, 'testSnapshot']);
    Route::get('status/{lane}', [CameraController::class, 'healthCheck']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
