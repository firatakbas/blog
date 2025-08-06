<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});


Route::prefix('auth')->group(function () {
    Route::post('/store', [AuthController::class, 'store']);
    Route::post('/login', [AuthController::class, 'login']);
});
