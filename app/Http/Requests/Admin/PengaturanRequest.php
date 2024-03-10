<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PengaturanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'favicon'             => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'logo'                => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'logo_2'              => ['nullable','file','image','mimes:png,jpg,jpeg'],
            'site_name'           => ['required','string','max:100'],
            'tag'                 => ['required','string','max:100'],
            'current_password'    => ['required','current_password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'favicon'             => 'Favicon',
            'logo'                => 'Logo',
            'logo_2'              => 'Logo 2',
            'site_name'           => 'Nama Website',
            'tag'                 => 'Tag Website',
            'current_password'    => 'Password Konfirmasi',
        ];
    }
}
