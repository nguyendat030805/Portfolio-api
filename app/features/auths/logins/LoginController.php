<?php

namespace App\features\auths\logins;

use App\features\auths\logins\LoginRequest as RequestsLoginRequest;
use App\features\auths\logins\LoginService;
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
            
            $token = $result['access_token'];
            return redirect("http://localhost:5173/auth/callback?token={$token}");
        } catch (\Exception $e) {
    
            return redirect("http://localhost:5173/login?error=" . urlencode($e->getMessage()));
        }
    }
} 
