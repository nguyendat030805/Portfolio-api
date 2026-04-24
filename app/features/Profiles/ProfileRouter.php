<?php

namespace App\features\Profiles;

use App\features\Profiles\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [ProfileController::class, 'getProfile']);
    Route::post('/profile/update', [ProfileController::class, 'updateProfile']);
    Route::delete('/profile/cv/{id}',[ProfileController::class, 'deleteCv' ]);
});