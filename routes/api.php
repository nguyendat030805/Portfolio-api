<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require app_path('../app/features/auths/registers/RegisterRouter.php');
    require app_path('../app/features/auths/logins/LoginRouter.php');
    require app_path('../app/features/Profiles/ProfileRouter.php');
    require app_path('../app/features/Projects/ProjectRouter.php');
});
