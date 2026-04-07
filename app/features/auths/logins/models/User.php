<?php

namespace App\features\auths\logins\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
