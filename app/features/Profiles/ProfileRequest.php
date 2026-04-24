<?php

namespace App\features\Profiles;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'nullable|string|max:50',
            'bio'      => 'nullable|string|max:255', 
            'phone'    => 'nullable|string|max:20',
            'birthday' => 'nullable|string',
            'Cv_Image' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,gif,pdf',
                'max:5120'
            ],
            'avatar' => [
                'nullable',
                'image',         
                'mimes:jpeg,png,jpg,gif',
                'max:5120', 
            ],
        ];
    }
    public function messages()
    {
        return [
            'avatar.image' => 'The uploaded file must be an image..',
            'avatar.mimes' => 'Only jpeg, png, jpg, gif files are allowed.',
            'avatar.max'   => 'The avatar image may not be greater than 5120 kilobytes.',
            'bio.max'      => 'The bio field may not be greater than 255 characters.',
            'Cv_Image.mimes' => 'Only jpeg,png,jpg,gif, PDF files are allowed.',
            'Cv_Image.max'=>'The CV image may not be greater than 5120 kilobytes.'
        ];
    }
}
