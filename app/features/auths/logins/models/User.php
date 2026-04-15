<?php

namespace App\features\auths\logins\models;
;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'google_id',
        'bio',
        'Cv_Image',
        'avatar',
        'phone',
        'birthday',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
