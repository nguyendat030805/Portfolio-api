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
        if (!$user) {
            throw new \Exception("Không tìm thấy người dùng với ID: " . $userId);
        }
        $user->update($data);
        $user->refresh(); 
        return $user;
    }

    public function findById($id) {
        return User::findOrFail($id);
    } 

    public function clearCvImageInDb($userId) {
        return User::where('id', $userId)->update(['Cv_Image' => null]);
    }
}
