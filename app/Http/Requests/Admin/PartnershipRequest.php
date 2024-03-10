<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnershipRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => [($this->isMethod('PUT') ? 'nullable' : 'required'),'file','image','mimes:png,jpg,jpeg'],
            'name'  => ['required','string','max:100'],
            'link'  => ['required','string','max:1000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Logo',
            'name'  => 'Nama',
            'link'  => 'Link',
        ];
    }
}
