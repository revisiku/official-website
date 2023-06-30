<?php

namespace App\Services;

use App\Models\Ref\LogLogin;
use App\Services\VisitorService;

class LogLoginService
{

    private static function save($body, $is_success = true)
    {
        return LogLogin::create([
            'visitor_id' => VisitorService::check()->first()->id,
            'user_id' => auth()->id() ?: null,
            'body' => $body,
            'is_success' => $is_success,
        ]);
    }

    public static function success()
    {
        return static::save('Login Berhasil');
    }

    public static function failed($message)
    {
        return static::save($message, false);
    }
}
