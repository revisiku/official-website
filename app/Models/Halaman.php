<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'halaman';

    protected $guarded = ['id'];


    public static function publicData($en, $whereValue)
    {
        return static::select('cover', $en.'body AS body')
            ->where('page_name', $whereValue)->first();
    }
}
