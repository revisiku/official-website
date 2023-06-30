<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLogin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'ref_log_logins';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
