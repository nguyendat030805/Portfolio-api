<?php

namespace App\features\Projects;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_github' => 'nullable|url',
            'link_demo' => 'nullable|url',
            'tech_stack' => 'required|array',
        ];
    }
}
