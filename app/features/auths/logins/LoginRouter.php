<?php

namespace App\features\auths\logins;

use App\features\auths\logins\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [LoginController::class, 'login']);
