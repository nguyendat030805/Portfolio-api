<?php

namespace App\features\Profiles;

use App\features\auths\logins\models\User;
use Illuminate\Support\Facades\Cache;

class ProfileRepository
{   

    private function getCacheKey($userId){
        return "user_profile: {$userId}";
    }

    public function getUserInfo($userId){
        $cacheKey = $this->getCacheKey($userId);
        return Cache::remember($cacheKey, now()->addHours(12), function() use ($userId) {
        $user = User::find($userId);
        
        return $user ? $user->toArray() : null;
    });
    }

    public function updateByProfile($userId, array $data){
        $user = User::find($userId);
        if (!$user) {
            throw new \Exception("User ID not found: " . $userId);
        }
        $user->update($data);
        Cache::forget($this->getCacheKey($userId));
        $user->refresh(); 
        return $user;
    }

    public function findById($id) {
        return User::findOrFail($id);
    } 

    public function clearCvImageInDb($userId) {
        $result =  User::where('id', $userId)->update(['Cv_Image' => null]);
        Cache::forget($this->getCacheKey($userId));
        return $result;
    }
}
