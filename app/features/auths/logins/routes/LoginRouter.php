<?php

namespace App\features\auths\logins\routes;

use App\features\auths\logins\controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
