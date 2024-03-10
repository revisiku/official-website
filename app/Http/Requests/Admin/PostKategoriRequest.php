<?php

namespace App\Http\Requests\Admin;

use App\Models\PostKategori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostKategoriRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required','string','min:1','max:100',
                            Rule::unique(PostKategori::class)->when(
                                $this->isMethod('PUT'),
                                fn ($rule) => $rule->ignore($this->postKategori->id)
                            )
                        ],
            'en_name'   => ['required','string','min:1','max:100'],
            'type'      => ['required','in:'.implode(',', PostKategori::TYPE)],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => 'Nama Kategori',
            'en_name'   => 'Nama Kategori (EN)',
            'type'      => 'Tipe Kategori',
        ];
    }
}
