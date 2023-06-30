<?php

namespace App\Helpers;

class Converter {

    public static function arrToStr(array $array) : string
    {
        return '["'.implode('","', $array).'"]';
    }

    public static function strToArr(string $str)
    {
        return json_decode($str);
    }

    public static function arrMerge($array, ...$newArray)
    {
        return array_merge($array, ...$newArray);
    }
}
