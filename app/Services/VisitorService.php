<?php

namespace App\Services;

use App\Models\Ref\Visitor;
use Jenssegers\Agent\Agent;

class VisitorService
{

    private static function ip() { return request()->ip(); }
    private static function url() { return request()->url(); }

    public static function audit()
    {
        UrlVisitedService::audit(static::url(), static::ip());

        $check = static::check();
        if ($check->count()) {
            return static::update($check);
        }

        return static::create();
    }

    public static function check()
    {
        return Visitor::where('ip_address', static::ip())
            ->where('visitor_uuid', VisitorCookieService::get());
    }

    private static function create()
    {
        $agent = new Agent();

        $browser = $agent->browser();
        $platform = $agent->platform();
        $userAgent = $agent->getUserAgent();

        $hardware = $agent->isDesktop()
            ? 'Desktop'
            : ($agent->isTablet()
                ? 'Tablet'
                : 'Smartphone'
            );

        $cookie = new VisitorCookieService();
        $cookie->generateUuid();
        $cookie->set();

        $params = [
            'visitor_uuid' => $cookie->getUuid(),
            'ip_address' => static::ip(),
            'device' => $agent->device(),
            'hardware' => $hardware,
            'browser' => $browser,
            'platform' => $platform,
            'is_bot' => $agent->isRobot(),
            'data' => json_encode([
                'bot_name' => $agent->isRobot() ? $agent->robot() : null,
                'browser_version' => $agent->version($browser),
                'platform_version' => $agent->version($platform),
                'user_agent' => $userAgent,
            ]),
            'url' => static::url(),
        ];

        return Visitor::create($params);
    }

    private static function update($query)
    {
        $row = $query->first();
        $hits = $row->hits;

        if (now()->diffInHours($row->updated_at) > 2) {
            $hits += 1;
        }

        VisitorCookieService::update();

        return $query->update([
            'hits' => $hits,
            'url' => static::url(),
        ]);
    }
}
