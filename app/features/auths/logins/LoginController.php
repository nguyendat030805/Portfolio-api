<?php

namespace App\features\auths\logins;

use App\features\auths\logins\LoginRequest as RequestsLoginRequest;
use App\features\auths\logins\LoginService;
use App\Traits\ApiResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController
{
    protected $LoginService;
    public function __construct(LoginService $LoginService)
    {
        $this->LoginService = $LoginService;
    }

    use ApiResponse;

    public function login(RequestsLoginRequest $request): JsonResponse{
        $data = $request->validated();
        $result = $this->LoginService->findUserbyEmail($data['email'], $data['password']);
        return $this->success($result, 'Login successful');
    }

    public function rejectGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleLogin(){
        try {
            $googleUser = Socialite::driver('google')->user();
            $result = $this->LoginService->findOrCreateGoogleUser($googleUser);
            
            $token = $result['access_token'];
            return redirect("https://portfolio-api-1-xnrd.onrender.com/auth/callback?token={$token}");
        } catch (\Exception $e) {
    
            return redirect("https://portfolio-api-1-xnrd.onrender.com/login?error=" . urlencode($e->getMessage()));
        }
    }
} 
