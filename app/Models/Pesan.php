<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'pesan';

    protected $guarded = ['id'];

    const IS_READED = true;


    public function user()
    {
        return $this->belongsTo(User::class, 'readed_by');
    }

    public function isReaded()
    {
        return $this->is_readed == static::IS_READED;
    }

    public function getStatusHtml()
    {
        return $this->isReaded()
            ? '<span class="badge badge-dark fw-bold">Dibaca</span>'
            : '<span class="badge badge-success fw-bold">Baru</span>';
    }
}
