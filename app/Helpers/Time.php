<?php

namespace App\Helpers;

use Carbon\Carbon;

class Time {

    private static $text = 'WIB';

    public static function convert(
        $date,
        ?string $format = 'H:i',
        ?bool $text = false
    ) : string {
        return Carbon::parse($date)->format($format).($text ? ' '.self::$text : '');
    }

}
