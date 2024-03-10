<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        view()->share('newMessageCount', \App\Models\Pesan::where('is_readed', 0)->count());
        view()->share('newMessage', \App\Models\Pesan::latest()->limit(5)->get());
    }
}
