<?php

namespace App\Models\Stat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatWhatsapp extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'ref_whatsapp_clicks';

    protected $guarded = ['id'];
}
