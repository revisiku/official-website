<?php

namespace App\Http\Controllers;

use App\Models\SosialMedia;
use App\Models\Stat\StatWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RedirectController extends Controller
{

    public function __invoke(Request $request)
    {
       try {
            if ($request->stats == 'sosial-media') {
                $this->statsSocialMedia($request->ip(), $request->link);
            } elseif ($request->stats == 'whatsapp') {
                $this->statsWhatsapp($request->ip());
            }
            return redirect($request->link);
       } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return '<script>window.close()</script>';
       }
    }

    public function statsSocialMedia($ip, $link)
    {
        $query = SosialMedia::where('link', $link)->first();
        $stat = $query->stats()->where('ip_address', $ip)->whereDate('created_at', \Carbon\Carbon::today())->first();

        if ($stat) {
            return $stat->update(['hits' => $stat->hits+1]);
        }

        return $query->stats()->create([
            'ip_address' => $ip,
        ]);

    }

    public function statsWhatsapp($ip)
    {
        $stat = StatWhatsapp::where('ip_address', $ip)->whereDate('created_at', \Carbon\Carbon::today())->first();

        if ($stat) {
            return $stat->update(['hits' => $stat->hits+1]);
        }

        return StatWhatsapp::create([
            'ip_address' => $ip,
        ]);
    }
}
