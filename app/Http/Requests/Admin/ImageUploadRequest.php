<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => ['required','file','image','mimes:png,jpg,jpeg'],
        ];
    }

    public function attributes(): array
    {
        return [
            'file' => 'Gambar',
        ];
    }
}
