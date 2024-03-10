<?php

namespace App\Models;

use App\Services\LangService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'post';

    protected $guarded = ['id'];

    public const TYPE = [
        'blog',
        'berita',
    ];

    protected $with = ['user:id,name', 'postCategory'];

    const IS_PUBLISH = true;


    public static function adminTableFields(): array
    {
        return [
            'id',
            'post_kategori_id',
            'user_id',
            'cover',
            'title',
            'is_publish',
            'hits',
            'created_at',
            'published_at',
            'slug'
        ];
    }

    public static function publicFields($en): array
    {
        return [
            'id',
            'user_id',
            'post_kategori_id',
            'cover',
            $en.'title as title',
            $en.'short as short',
            $en.'body as body',
            'hits',
            'published_at',
            'slug',
        ];
    }

    public static function publicCoverFields($en): array
    {
        return [
            'id',
            'user_id',
            'post_kategori_id',
            'cover',
            $en.'title as title',
            'hits',
            'published_at',
            'slug',
        ];
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postCategory() : BelongsTo
    {
        return $this->belongsTo(PostKategori::class, 'post_kategori_id');
    }

    protected function slug() : Attribute
    {
        return Attribute::make(
            set: fn(string $value) => str($value)->slug()
        );
    }

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

    public function scopeWhereByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeLatestPublishByType($query, $type)
    {
        return $query->latest()
            ->publish()
            ->whereByType($type);
    }

    public function scopePopularPublish($query, $type)
    {
        return $query->orderByDesc('hits')
            ->publish()
            ->whereByType($type);
    }

    public function publishedAtShortConverter()
    {
        return $this->getPublicPublishedAtShort();
    }

    public function publishedAtLongConverter()
    {
        return $this->getPublicPublishedAtLong();
    }

    public function getStatusHtml()
    {
        return $this->isPublish()
                ? '<span class="badge badge-success fw-bold">Publis</span>'
                : '<span class="badge badge-dark fw-bold">Arsip</span>';
    }
}
