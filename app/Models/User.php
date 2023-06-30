<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,
        \App\Traits\AppDatetime;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function password() : Attribute
    {
        return Attribute::set(function($value) {
            if ($value) return bcrypt($value);
        });
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function isActive()
    {
        return $this->is_active == 1;
    }

    public function isInactive()
    {
        return $this->is_active == 0;
    }

    public function getStatusHtml()
    {
        return $this->isActive()
                ? '<span class="badge badge-success fw-bold">Active</span>'
                : '<span class="badge badge-danger fw-bold">Inactive</span>';
    }
}
