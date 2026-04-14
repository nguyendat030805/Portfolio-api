<?php

namespace App\features\auths\registers;

use App\features\auths\logins\models\User;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    public function createNewUser($name, $email, $password){
        $users = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return $users;
    }
}
