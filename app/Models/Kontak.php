<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'kontak';

    protected $guarded = ['id'];
}
