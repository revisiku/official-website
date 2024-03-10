<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AkunRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required','string','min:1','max:100'],
            'email'     => ['required','email','min:1','max:100',
                            Rule::unique(\App\Models\User::class)->when(
                                $this->isMethod('PUT'),
                                fn ($rule) => $rule->ignore($this->akun->id)
                            )
                        ],
            'username'  => ['required','alpha_num','min:6','max:100',
                            Rule::unique(\App\Models\User::class)->when(
                                $this->isMethod('PUT'),
                                fn ($rule) => $rule->ignore($this->akun->id)
                            )
                        ],
            'password'  => ['required','alpha_num','min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique'     => 'Email sudah digunakan.',
            'username.unique'  => 'Username sudah digunakan.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => 'Nama',
            'email'     => 'Email',
            'username'  => 'Username',
            'password'  => 'Password',
        ];
    }
}
