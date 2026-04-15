<?php

namespace App\features\auths\registers;

use App\features\auths\registers\RegisterRequest;
use App\features\auths\registers\RegisterService;
use Illuminate\Http\JsonResponse;
use Nette\Utils\Json;

class RegisterController
{
    protected $RegisterService;
    public function __construct(RegisterService $RegisterService)
    {
        $this->RegisterService = $RegisterService;
    }

    public function register(RegisterRequest $request): JsonResponse{
        $data = $request->validated();
        $result = $this->RegisterService->createNewUser($data['name'], $data['email'], $data['password']);
        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'data' => $result
        ], 201);
        
    }
}
