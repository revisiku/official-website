<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostKategori extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'post_kategori';

    protected $guarded = ['id'];

    public const TYPE = [
        'umum',
        'blog',
        'berita',
    ];


    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'post_kategori_id');
    }

    protected function slug() : Attribute
    {
        return Attribute::make(
            set: fn(string $value) => str($value)->slug()
        );
    }
}
