<?php

namespace App\Models\Stat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatSosialMedia extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'ref_sosial_media_clicks';

    protected $guarded = ['id'];
}
