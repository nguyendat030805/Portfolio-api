<?php

namespace App\Providers;

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UploadApi::class, function ($app){
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => config('services.cloud.cloud_name'),
                    'api_key' => config('services.cloud.api_key'), 
                    'api_secret' => config('services.cloud.api_secret'),
                ],
                'url' => [
                    'secure' => true
                ]
            ]);
            return new UploadApi();
        });
    }

    public function boot(): void
    {
        //
    }
}
