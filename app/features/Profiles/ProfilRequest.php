<?php

namespace App\features\Profiles;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
            'avatar.image' => 'File tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'avatar.max'   => 'Ảnh đại diện không được vượt quá 2MB.',
            'bio.max'      => 'Đoạn giới thiệu (bio) không được quá 255 ký tự.',
            'Cv_Image.mimes' => 'Chỉ chấp nhận các định dạng: jpeg,png,jpg,gif, PDF',
            'Cv_Image.max'=>'Ảnh Cv không được vượt quá 255 ký tự'
        ];
    }
}
