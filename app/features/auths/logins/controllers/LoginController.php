<?php

namespace App\features\auths\logins\controllers;

use App\features\auths\logins\requests\LoginRequest as RequestsLoginRequest;
use App\features\auths\logins\services\LoginService;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController
{
    protected $LoginService;
    public function __construct(LoginService $LoginService)
    {
        $this->LoginService = $LoginService;
    }

    public function login(RequestsLoginRequest $request): JsonResponse{
        $data = $request->validated();
        $result = $this->LoginService->findUserbyEmail($data['email'], $data['password']);
        
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => $result
        ], 200);
    }

    public function rejectGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleLogin(){
        try {
            $googleUser = Socialite::driver('google')->user();
            $result = $this->LoginService->findOrCreateGoogleUser($googleUser);
            
            return response()->json([
                'status' => 'success',
                'message' => 'User logged in with Google successfully',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to login with Google: ' . $e->getMessage(),
            ], 500);
        }
    }
} 
