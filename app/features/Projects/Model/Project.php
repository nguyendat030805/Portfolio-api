<?php

namespace App\features\Projects\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'thumbnail',
        'link_github',
        'link_demo',
        'tech_stack'
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}
