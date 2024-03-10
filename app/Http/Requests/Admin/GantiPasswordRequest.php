<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GantiPasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password'      => ['required','current_password'],
            'new_password'          => ['required','min:6','max:255'],
            'retype_new_password'   => ['required','same:new_password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'current_password'      => 'Password Saat Ini',
            'new_password'          => 'Password Baru',
            'retype_new_password'   => 'Ulangi Password Baru',
        ];
    }
}
