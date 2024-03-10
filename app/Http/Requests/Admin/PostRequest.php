<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cover'    => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'title'    => ['required','string','max:255',
                            Rule::unique(\App\Models\Post::class)->when(
                                $this->isMethod('PUT'),
                                fn ($rule) => $rule->ignore($this->post->id)
                            )
                        ],
            'en_title' => ['required','string','max:255'],
            'short'    => ['required','string','max:300'],
            'en_short' => ['required','string','max:300'],
            'body'     => ['required','string'],
            'en_body'  => ['required','string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'cover'    => 'Cover',
            'title'    => 'Judul',
            'en_title' => 'Judul (EN)',
            'short'    => 'Isi Singkat',
            'en_short' => 'Isi Singkat (EN)',
            'body'     => 'Isi',
            'en_body'  => 'Isi (EN)',
        ];
    }
}
