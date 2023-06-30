<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlVisit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'ref_url_visits';
}
