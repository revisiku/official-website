<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoKontakRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'place_name'        => ['required','string','max:255'],
            'en_place_name'     => ['required','string','max:255'],
            'address_1'         => ['required','string','max:255'],
            'en_address_1'      => ['required','string','max:255'],
            'address_2'         => ['required','string','max:255'],
            'en_address_2'      => ['required','string','max:255'],
            'phone_number'      => ['required','string','max:255'],
            'email'             => ['required','string','max:255'],
            'gmap'              => ['required'],
            'current_password'  => ['required','current_password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'place_name'        => 'Nama Kantor',
            'en_place_name'     => 'Nama Kantor (EN)',
            'address_1'         => 'Alamat 1',
            'en_address_1'      => 'Alamat 1 (EN)',
            'address_2'         => 'Alamat 2',
            'en_address_2'      => 'Alamat 2 (EN)',
            'phone_number'      => 'Nomor Telphone',
            'email'             => 'Email',
            'gmap'              => 'Gmap',
            'current_password'  => 'Konfirmasi Password',
        ];
    }
}
