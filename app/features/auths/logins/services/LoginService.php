<?php

namespace App\features\auths\logins\services;

use App\features\auths\logins\repositories\LoginRepository;

class LoginService
{
    protected $LoginRepository;
    public function __construct(LoginRepository $LoginRepository)
    {
        $this->LoginRepository = $LoginRepository;
    }

    public function findUserbyEmail($email, $password){
        $user = $this->LoginRepository->attemptLogin($email, $password);
        if (!$user) {
            return [
                'message' => 'Invalid credentials',
                'status' => 'error'
            ];
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'access_token' => $token,
        ];
    }

    public function findOrCreateGoogleUser($googleUser)
    {
        $user = $this->LoginRepository->findOrCreateGoogleUser($googleUser);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'access_token' => $token,
        ];
    }
}
