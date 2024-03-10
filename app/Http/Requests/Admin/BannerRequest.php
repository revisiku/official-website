<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image'          => [($this->isMethod('PUT') ? 'nullable' : 'required'),'file','image','mimes:png,jpg,jpeg'],
            'title'          => ['required','string','max:100'],
            'link'           => ['required','string','max:1000'],
            'description'    => ['required','string','max:255'],
            'en_description' => ['required','string','max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'image'          => 'Banner',
            'title'          => 'Judul Banner',
            'link'           => 'Link',
            'description'    => 'Deskripsi',
            'en_description' => 'Deskripsi (EN)',
        ];
    }
}
