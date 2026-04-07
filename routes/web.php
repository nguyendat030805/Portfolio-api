<?php

use App\features\auths\logins\controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return response()->json(['status' => 'success', 'message' => 'Backend is Live!']);
});
Route::prefix('auth')->group(function () {
    Route::get('/google', [LoginController::class, 'rejectGoogleLogin']);
    Route::get('/google/callback', [LoginController::class, 'handleGoogleLogin']);
});