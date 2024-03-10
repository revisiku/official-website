<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'              => ['required','string','max:255'],
            'email'             => ['required','email','max:255',
                                    'unique:'.\App\Models\User::class.',email,'.auth()->id(),
                                ],
            'username'          => ['required','string','alpha_num','min:6','max:255',
                                    'unique:'.\App\Models\User::class.',username,'.auth()->id(),
                                ],
            'current_password'  => ['required','current_password'],
        ];
    }
}
