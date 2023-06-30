<?php

namespace App\Services;

class LangService
{

    public const DEFAULD = 'id';


    public static function changer($lang = '')
    {
        $locale = request()->segment(1);
        $url = url('/'.$lang).str_replace(url('/'), '', request()->url());

        if (in_array($locale, config()->get('app.avaible_locales'))) {
            $url = str_replace('/'.$locale, ($lang ? '/'.$lang : ''), request()->url());
        }

        $withQueryString = '';

        if ($queryString = request()->getQueryString())
            $withQueryString = '?'.$queryString;

        return ($url ?? request()->url()).$withQueryString;
    }

    public static function isOtherLang()
    {
        return app()->getLocale() !== 'id';
    }

    public static function url($url = '')
    {
        $lang = static::isOtherLang() ? app()->getLocale().'/' : null;
        return url($lang.$url);
    }

}
