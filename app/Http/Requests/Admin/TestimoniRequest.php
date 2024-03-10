<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimoniRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image'       => [($this->isMethod('PUT') ? 'nullable' : 'required'),'file','image','mimes:png,jpg,jpeg'],
            'people_name' => ['required','string','max:100'],
            'people_jobs' => ['required','string','max:100'],
            'body'        => ['required','string','max:500'],
            'en_body'     => ['required','string','max:500'],
        ];
    }

    public function attributes(): array
    {
        return [
            'image'       => 'Gambar',
            'people_name' => 'Nama Narsum',
            'people_jobs' => 'Status / Pekerjaan',
            'body'        => 'Testimoni',
            'en_body'     => 'Testimoni (EN)',
        ];
    }
}
