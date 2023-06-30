<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'testimoni';

    protected $guarded = ['id'];

    const IS_PUBLISH = true;


    public function isPublish()
    {
        return $this->is_publish == static::IS_PUBLISH;
    }

    public function scopePublish($query)
    {
        return $query->where('is_publish', static::IS_PUBLISH);
    }

    public function scopeLatestPublish($query)
    {
        return $query->latest()
            ->publish();
    }

    public function getStatusHtml()
    {
        return $this->isPublish()
                ? '<span class="badge badge-success fw-bold">Publis</span>'
                : '<span class="badge badge-dark fw-bold">Arsip</span>';
    }

    public static function getPublicData($en)
    {
        return static::select(
                'image',
                'people_name',
                'people_jobs',
                $en.'body AS body',
            )
            ->latestPublish()
            ->limit(3)
            ->get();
    }
}
