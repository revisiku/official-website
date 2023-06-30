<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan';

    protected $fillable = ['value'];


    public function scopeGetValue($query, $setting_name)
    {
        return $query->select('value')
            ->where('name', $setting_name)
            ->first()
            ->value;
    }

    public function scopeGetGlobalSettings($query)
    {
        $params = ['site_name','tag','favicon','logo','logo_2','footer_copyright'];
        return $query->select('name','value')
            ->tap(function($query) use ($params) {
                collect($params)->map(function($param) use ($query) {
                    $query->orWhere('name', $param);
                });
            })
            ->get();
    }
}
