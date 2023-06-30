<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\PublicController;
use App\Models\Kontak;

class BerandaController extends PublicController
{

    public function index()
    {
        return view('public.contents.landing_page.index', [
                'gmap' => Kontak::select('gmap')->first()->gmap
            ]
        );
    }
}
