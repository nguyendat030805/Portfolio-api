<?php

namespace App\features\Profiles;

use App\features\Profiles\ProfileService;
use App\features\Profiles\ProfilRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    protected $service;
    public function __construct(ProfileService $service) 
    {
        $this->service = $service;
    }

    public function getProfile(){
        try{
            $userId = Auth::id();
            $user = $this->service->getUserInfo($userId);
            return response()->json([
                'message' => 'Profile retrieved successfully',
                'user' => $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to retrieve profile: ' . $e->getMessage()
             ], 500);   
        }
    }

    public function updateProfile(ProfilRequest $request){
        try{
            $userId = Auth::id();
            $validateData = $request->validated();
            $avatarFile = $request->file('avatar');
            $user = $this->service->updateProfile($userId, $validateData, $avatarFile);
            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to update profile: ' . $e->getMessage()
             ], 500);   
        }
    }
}
