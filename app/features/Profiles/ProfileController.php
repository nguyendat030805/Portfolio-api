<?php

namespace App\features\Profiles;

use App\features\Profiles\ProfileService;
use App\features\Profiles\ProfileRequest;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    protected $service;
    public function __construct(ProfileService $service) 
    {
        $this->service = $service;
    }
    use ApiResponse;
    public function getProfile(){
        try{
            $userId = Auth::id();
            $user = $this->service->getUserInfo($userId);
            return $this->success($user, 'Profile retrieved successfully');
        }catch(\Exception $e){
            return $this->error('Failed to retrieve profile: ' . $e->getMessage(), 500);   
        }
    }

    public function updateProfile(ProfileRequest $request){
        try{
            $userId = Auth::id();
            $validateData = $request->validated();
            $avatarFile = $request->file('avatar');
            $Cv_Image = $request->file('Cv_Image');
            $user = $this->service->updateProfile($userId, $validateData, $avatarFile, $Cv_Image);
            return $this->success($user, 'Profile updated successfully');
        }catch(\Exception $e){
            return $this->error('Failed to update profile: ' . $e->getMessage(), 500);   
        }
    }

    public function deleteCv() {
        try {
            $id = Auth::id();
            
            if (!$id) {
                return $this->error('Unauthorized', 401);
            }

            $this->service->deleteCvImage($id);

            return $this->success(null, 'CV image deleted successfully');
        } catch (Exception $e) {
            return $this->error('Failed to delete CV image: ' . $e->getMessage(), 500);
        }
    }
}
