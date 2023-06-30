<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'ref_visitors';


    public function logLogin()
    {
        return $this->hasMany(LogLogin::class, 'visitor_id');
    }
}
