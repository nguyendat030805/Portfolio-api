<?php

namespace App\features\Projects;

use App\features\Projects\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/projects', [ProjectController::class, 'getProject']);
    Route::post('/projects', [ProjectController::class, 'createProject']);
    Route::put('/projects/{id}', [ProjectController::class, 'updateProject']);
    Route::delete('/projects/{id}', [ProjectController::class, 'deleteProject']);
});
