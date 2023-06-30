<?php

namespace App\Helpers;

class NumberFormat
{

    private static $thousandsSeparator = ',';

    private static $decimalSeparator = '.';

    private static $decimals = 2;

    public static function convert(
        $number,
        int $decimals = null,
    ) : string {
        return number_format(
            $number,
            $decimals,
            static::$decimalSeparator,
            static::$thousandsSeparator
        );
    }

    public static function isDecimal($number) : bool
    {
        return (float) $number !== floor($number);
    }

    public static function decimal($number)
    {
        return static::convert($number, static::$decimals);
    }

    public static function thousands($number)
    {
        return static::convert($number, 0);
    }

    public static function isMillion($number) : bool
    {
        return strlen($number) >= 7 && strlen($number) <= 9 ;
    }

    public static function toMillionInt($number) : int
    {
        return floor($number/1000000);
    }

    public static function toMillion($number, $text = 'JT') : string
    {
        if (!$number) return $number;
        return static::thousands(static::toMillionInt($number)).' '.$text;
    }

    public static function isBillion($number) : bool
    {
        return strlen($number) >= 10 && strlen($number) <= 12 ;
    }

    public static function toBillionInt($number) : int
    {
        return floor($number/1000000000);
    }

    public static function toBillion($number, $text = 'M') : string
    {
        if (!$number) return $number;
        return static::thousands(static::toBillionInt($number)).' '.$text;
    }
}
