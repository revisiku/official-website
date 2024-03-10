<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HalamanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cover'    => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'title'    => ['required','string','max:100',
                            Rule::unique(\App\Models\Halaman::class)->when(
                                $this->isMethod('PUT'),
                                fn ($rule) => $rule->ignore($this->halaman->id)
                            )
                        ],
            'en_title' => ['required','string','max:100'],
            'body'     => ['required','string'],
            'en_body'  => ['required','string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'cover'    => 'Cover',
            'title'    => 'Nama Halaman',
            'en_title' => 'Nama Halaman (EN)',
            'body'     => 'Isi Halaman',
            'en_body'  => 'Isi Halaman (EN)',
        ];
    }
}
