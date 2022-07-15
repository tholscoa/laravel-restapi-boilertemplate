<?php

use Illuminate\Http\Request;
use Modules\User\Http\Controllers\PermissionController;
// use Illuminate\Routing\Route;
use Modules\User\Http\Controllers\UserController;
use Spatie\Permission\Traits\HasRoles;
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

Route::middleware('auth:api')->prefix('user')->group(function () {
    Route::get('profile/{id}', [UserController::class, 'userProfile']);
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'getAllPermissions']);
        Route::get('self', [PermissionController::class, 'getMyPermissions']);
        Route::post('{action}', [PermissionController::class, 'assignRevokePermissions']);
        
    });
});
Route::prefix('register')->group(function () {
    Route::post('', [UserController::class, 'register']);  
    Route::post('confirm_otp', [UserController::class, 'verifyEmail']);  
    Route::post('resend_otp', [UserController::class, 'resendOtp']);  
});
