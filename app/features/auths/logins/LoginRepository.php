<?php

namespace App\features\auths\logins;

use App\features\auths\logins\models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginRepository
{
    public function attemptLogin($email, $password){
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        return $user;
    }

    public function findOrCreateGoogleUser($googleUser)
    {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            $user->update(['google_id' => $googleUser->getId()]);
            return $user;
        }
        return User::create([
            'email'     => $googleUser->getEmail(),
            'name'      => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password'  => Hash::make(Str::random(16)),
        ]);
    }
}
