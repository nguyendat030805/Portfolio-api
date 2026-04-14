<?php

namespace App\features\Profiles;

use App\features\auths\logins\models\User;
use Illuminate\Support\Facades\Cache;

class ProfileRepository
{
    public function getUserInfo($userId){
        $cacheKey = "user_info_{$userId}";
        return Cache::remember($cacheKey, now()->addHours(2), function()use ($userId) {
            return User::find($userId);
        });
    }

    public function updateByProfile($userId, array $data){
        $user = User::find($userId);
        if(!$user){
            $user->update($data);
            Cache::forget("user_info_{$userId}");
        }

        return $user;
    }
}
