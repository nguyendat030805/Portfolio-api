<?php

namespace App\features\auths\registers;

use App\features\auths\registers\RegisterRepository;

class RegisterService
{
    protected $RegisterRepository;
    public function __construct(RegisterRepository $RegisterRepository)
    {
        $this->RegisterRepository = $RegisterRepository;
    }

    public function createNewUser($name, $email, $password){
        $user = $this->RegisterRepository->createNewUser($name, $email, $password);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }
}
