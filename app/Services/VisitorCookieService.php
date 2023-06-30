<?php

namespace App\Services;

class VisitorCookieService
{

    protected const COOKIE_NAME = '__r_vId';

    protected static $uuid;


    public static function run()
    {
        if (!request()->hasCookie(static::COOKIE_NAME))
            return static::set();

        return static::update();
    }

    public static function generateUuid()
    {
        return static::$uuid = str()->uuid()->toString();
    }

    public static function getUuid()
    {
        return static::$uuid;
    }

    public static function set()
    {
        return cookie()->queue(cookie(
                static::COOKIE_NAME, static::getUuid(), static::_timeExpired(), '/'
            ));
    }

    public static function update()
    {
        return cookie()->queue(cookie(
                static::COOKIE_NAME, static::get(), static::_timeExpired(), '/'
            ));
    }

    public static function get()
    {
        return request()->cookie(static::COOKIE_NAME);
    }

    private static function _timeExpired()
    {
        return time()+strtotime(\Carbon\Carbon::now()->addYear());
    }
}
