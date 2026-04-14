<?php

namespace App\features\auths\registers;

use App\features\auths\registers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [RegisterController::class, 'register']);
