<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Input :attribute harus diterima.',
    'active_url'           => 'Input :attribute bukan URL yang sah.',
    'after'                => 'Input :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Input :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Input :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Input :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Input :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Input :attribute harus berupa sebuah array.',
    'before'               => 'Input :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Input :attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Input :attribute harus antara :min dan :max.',
        'file'    => 'Input :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Input :attribute harus antara :min dan :max karakter.',
        'array'   => 'Input :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Input :attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Input :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Input :attribute harus tanggal yang sama dengan :date.',
    'date_format'          => 'Input :attribute tidak cocok dengan format :format.',
    'different'            => 'Input :attribute dan :other harus berbeda.',
    'digits'               => 'Input :attribute harus berupa angka :digits.',
    'digits_between'       => 'Input :attribute harus antara angka :min dan :max.',
    'dimensions'           => 'Input :attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => 'Input :attribute memiliki nilai yang duplikat.',
    'email'                => 'Input :attribute harus berupa alamat surel yang valid.',
    'ends_with'            => 'Input :attribute harus diakhiri dengan: :values.',
    'exists'               => 'Input :attribute yang dipilih tidak valid.',
    'file'                 => 'Input :attribute harus berupa file.',
    'filled'               => 'Input :attribute wajib diisi.',
    'gt' => [
        'numeric'   => 'Input :attribute harus lebih besar dari :value.',
        'file'      => 'Input :attribute harus lebih besar dari :value kilobytes.',
        'string'    => 'Input :attribute harus lebih besar dari :value karakter.',
        'array'     => 'Input :attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric'   => 'Input :attribute harus lebih besar dari atau sama dengan :value.',
        'file'      => 'Input :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string'    => 'Input :attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array'     => 'Input :attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => 'Input :attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => 'Input :attribute tidak terdapat dalam :other.',
    'integer'              => 'Input :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Input :attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => 'Input :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => 'Input :attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => 'Input :attribute harus berupa JSON string yang valid.',
    'lt' => [
        'numeric'   => 'Input :attribute harus kurang dari :value.',
        'file'      => 'Input :attribute harus kurang dari :value kilobytes.',
        'string'    => 'Input :attribute harus kurang dari :value karakter.',
        'array'     => 'Input :attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric'   => 'Input :attribute harus kurang dari atau sama dengan :value.',
        'file'      => 'Input :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'    => 'Input :attribute harus kurang dari atau sama dengan :value karakter.',
        'array'     => 'Input :attribute tidak boleh lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => 'Input :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Input :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Input :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Input :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Input :attribute harus dokumen berjenis: :values.',
    'mimetypes'            => 'Input :attribute harus berupa file bertipe: :values.',
    'min'                  => [
        'numeric' => 'Input :attribute harus minimal :min.',
        'file'    => 'Input :attribute harus minimal :min kilobytes.',
        'string'  => 'Input :attribute harus minimal :min karakter.',
        'array'   => 'Input :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Input :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Input :attribute format tidak valid.',
    'numeric'              => 'Input :attribute harus berupa angka.',
    'current_password'     => 'Password yang Anda masukkan salah.',
    'present'              => 'Input :attribute wajib ada.',
    'regex'                => 'Format input :attribute tidak valid.',
    'required'             => 'Input :attribute wajib diisi.',
    'required_if'          => 'Input :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Input :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Input :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Input :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Input :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Input :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Input :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Input :attribute harus berukuran :size.',
        'file'    => 'Input :attribute harus berukuran :size kilobyte.',
        'string'  => 'Input :attribute harus berukuran :size karakter.',
        'array'   => 'Input :attribute harus mengandung :size item.',
    ],
    'starts_with'          => 'Input :attribute harus dimulai dengan: :values.',
    'string'               => 'Input :attribute harus berupa string.',
    'timezone'             => 'Input :attribute harus berupa zona waktu yang valid.',
    'unique'               => ':attribute sudah digunakan.',
    'uploaded'             => ':attribute gagal mengunggah.',
    'url'                  => 'Format input :attribute tidak valid.',
    'uuid'                 => 'Input :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name'              => 'Nama',
        'gender'            => 'Jenis Kelamin',
        'birthplace'        => 'Tempat Lahir',
        'date_of_birth'     => 'Tanggal Lahir',
        'address'           => 'Alamat',
        'district'          => 'Kabupaten',
        'subdistrict'       => 'Kecamatan',
        'village'           => 'Keluarahan/Desa',
        'time'              => 'Pukul',
        'date'              => 'Tanggal',
        'month'             => 'Bulan',
        'year'              => 'Tahun',
    ],

];
