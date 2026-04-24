<?php

namespace App\Services;

use Cloudinary\Api\Upload\UploadApi;
use Exception;

class CloudinaryService
{
    protected $uploadApi;
    public function __construct(UploadApi $uploadApi)
    {
        $this->uploadApi = $uploadApi;
    }

    public function uploadImage($file, $folder = 'general')
    {
        try {
            if (!$file) return null;

            $result = $this->uploadApi->upload($file->getRealPath(), [
                'folder' => $folder,
                'resource_type' => 'auto'
            ]);

            return $result['secure_url'];
        } catch (Exception $e) {
            throw new Exception("Cloudinary Error: " . $e->getMessage());
        }
    }
}