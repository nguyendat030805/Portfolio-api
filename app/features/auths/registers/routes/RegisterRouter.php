<?php

namespace App\features\auths\registers\routes;

use App\features\auths\registers\controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);
