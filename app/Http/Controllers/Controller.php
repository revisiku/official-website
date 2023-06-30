<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $pageName;


    public function __construct()
    {
        // Setup Global Variable
        view()->share('pageName', $this->pageName);

        foreach (\App\Models\Pengaturan::getGlobalSettings() as $setting) {
            view()->share($setting->name, $setting->value);
        }
    }
}
