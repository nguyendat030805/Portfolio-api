<?php

namespace App\features\Profiles;

use App\features\auths\logins\models\User;

class ProfileRepository
{
    public function getUserInfo($userId){
        return User::find($userId);
    }

    public function updateByProfile($userId, array $data){
        $user = User::find($userId);
        $user->update($data);
        return $user;
    }
}
