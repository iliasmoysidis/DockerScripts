<?php

use App\Http\Controllers\AIModelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DssF1Controller;
use App\Http\Controllers\DssF2Controller;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\DssF5Controller;

Route::prefix('auth')->group(function () {
    // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('api.auth')->group(function () {
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
