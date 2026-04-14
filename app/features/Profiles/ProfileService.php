<?php

namespace App\features\Profiles;

use App\Services\CloudinaryService;
use Exception;

class ProfileService
{
    protected $repository;
    protected $cloudinary;

    public function __construct(ProfileRepository $repository, CloudinaryService  $cloudinary) 
    {
        $this->repository = $repository;
        $this->cloudinary = $cloudinary;
    }

    public function getUserInfo($userId)
    {
        $user = $this->repository->getUserInfo($userId);
        if (!$user) {
            throw new Exception("User not found");
        }
        return $user;
    }

    public function updateProfile($userId, $validatedData, $avatarFile = null)
    {

        $user = $this->repository->getUserInfo($userId);
        if (!$user) {
            throw new Exception("User not found");
        }

        if ($avatarFile && $avatarFile->isValid()) {
            $validatedData['avatar'] = $this->cloudinary->uploadImage($avatarFile, 'avatars');
        }
        return $this->repository->updateByProfile($userId, $validatedData);
    }
}