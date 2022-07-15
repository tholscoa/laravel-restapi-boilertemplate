<?php

use Illuminate\Http\Request;
use Modules\Location\Http\Controllers\LocationController;

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

Route::middleware('auth:api')->get('/location', function (Request $request) {
    return $request->user();
});

Route::prefix('location')->group(function () {
    Route::get('countries', [LocationController::class, 'getAllCountries']);
    Route::get('country/{id}', [LocationController::class, 'getCountry']);
    Route::get('state/{id}', [LocationController::class, 'getState']);
});
