<?php

namespace App\features\auths\registers;

use App\features\auths\registers\RegisterRequest;
use App\features\auths\registers\RegisterService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Nette\Utils\Json;

class RegisterController
{
    protected $RegisterService;
    public function __construct(RegisterService $RegisterService)
    {
        $this->RegisterService = $RegisterService;
    }
     use ApiResponse;
    public function register(RegisterRequest $request): JsonResponse{
        $data = $request->validated();
        $result = $this->RegisterService->createNewUser($data['name'], $data['email'], $data['password']);
        return $this->success($result, 'User registered successfully');
        
    }
}
