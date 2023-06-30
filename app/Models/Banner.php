<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'banner';

    protected $guarded = ['id'];

    const IS_PUBLISH = true;

    const IS_NEW_WINDOW = true;


    public function isPublish()
    {
        return $this->is_publish == static::IS_PUBLISH;
    }

    public function isNewWindow()
    {
        return $this->is_new_window == static::IS_NEW_WINDOW;
    }

    public function scopePublish($query)
    {
        return $query->where('is_publish', static::IS_PUBLISH);
    }

    public function getStatusHtml()
    {
        return $this->isPublish()
                ? '<span class="badge badge-success fw-bold">Publis</span>'
                : '<span class="badge badge-dark fw-bold">Arsip</span>';
    }

    public function getNewWindowHtml()
    {
        return $this->isNewWindow()
                ? '<span class="badge badge-success fw-bold">Ya</span>'
                : '<span class="badge badge-danger fw-bold">Tidak</span>';
    }

    public static function getPublicData($en)
    {
        return static::select(
            'image',
            'title',
            $en.'description AS description',
            'link',
            'is_new_window',
        )->publish()->get();
    }
}
