<?php

namespace App\Models;

use App\Models\Stat\StatSosialMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'sosial_media';

    protected $guarded = ['id'];

    const IS_PUBLISH = true;



    public function stats()
    {
        return $this->hasMany(StatSosialMedia::class, 'sosial_media_id', 'id');
    }

    public function isPublish()
    {
        return $this->is_publish == static::IS_PUBLISH;
    }

    public function scopePublish($query)
    {
        return $query->where('is_publish', static::IS_PUBLISH);
    }

    public static function getPublish()
    {
        return static::select(
            'icon',
            'account_name',
            'link'
        )->publish()->get();
    }
}
