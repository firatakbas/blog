<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});


Route::prefix('auth')->group(function () {
    Route::post('/store', [AuthController::class, 'store']);
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth:sanctum')->prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::post('/store', [BlogController::class, 'store']);
    Route::get('/show/{id}', [BlogController::class, 'show']);
    Route::put('/update/{id}', [BlogController::class, 'update']);
    Route::delete('/delete/{id}', [BlogController::class, 'destroy']);
});
