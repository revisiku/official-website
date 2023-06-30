<?php

namespace App\Http\Controllers;


class PublicController extends Controller
{
    use \App\Traits\Tracker;

    protected $langField;


    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->visitor();
            return $next($request);
        });

        $this->langField = app()->getLocale() !== 'id' ? 'en_' : '';

        view()->share('socialMedia', \App\Models\SosialMedia::getPublish());

        view()->share('contact',
            \App\Models\Kontak::select(
                $this->langField.'place_name AS place_name',
                $this->langField.'address_1 AS address_1',
                $this->langField.'address_2 AS address_2',
                'phone_number',
                'email'
            )->first()
        );
    }
}
