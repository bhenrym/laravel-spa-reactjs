<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\MeController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;

  // Unprotected routes
    Route::group(['middleware' => 'guest:api'], function () {
        
            Route::post('login', LoginController::class)->name('api.login');
            Route::post('register', RegisterController::class)->name('api.register');

            // Password Reset Routes...
            Route::post('password/email', [ForgotPasswordController::class, 'api.sendResetLinkEmail']);
            Route::post('password/reset', [ResetPasswordController::class, 'api.reset']);
        
    });

    // Protected routes
    Route::middleware('auth:api')->group(function () {
            Route::get('me', [MeController::class, 'me'])->name('api.me');
            Route::post('logout', [LogoutController::class, 'logout'])->name('api.logout');
    });

