<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BerandaSectionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image_1'   => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'image_2'   => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'title'     => ['required','string','max:255'],
            'en_title'  => ['required','string','max:255'],
            'body'      => ['required','string','max:5000'],
            'en_body'   => ['required','string','max:5000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'image_1'   => 'Gambar 1',
            'image_2'   => 'Gambar 2',
            'title'     => 'Judul',
            'en_title'  => 'Judul (EN)',
            'body'      => 'Isi',
            'en_body'   => 'Isi (EN)',
        ];
    }
}
