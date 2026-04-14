<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require app_path('../app/features/auths/registers/routes/RegisterRouter.php');
    require app_path('../app/features/auths/logins/routes/LoginRouter.php');
    require app_path('../app/features/Profiles/ProfilRouter.php');
});
