<?php

namespace App\Services;

use App\Models\Ref\UrlVisit;
use Illuminate\Support\Facades\RateLimiter;

class UrlVisitedService
{

    public static function audit($url, $ip)
    {
        RateLimiter::hit('url-visit:'. $url.$ip, 30);
        if (!RateLimiter::tooManyAttempts('url-visit:'. $url.$ip, 2)) {

            $check = UrlVisit::where('url', $url)->whereDate('created_at', today())->first();

            if ($check) {
                return $check->update([
                    'hits' => $check->hits+1,
                ]);
            }

            if (!preg_match('/root/',  $url)) {
                return UrlVisit::create([
                    'url' =>  $url,
                ]);
            }
        }
    }
}
