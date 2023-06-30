<?php

namespace App\Traits;

use App\Services\VisitorService;

trait Tracker
{

    public function visitor()
    {
        VisitorService::audit();
    }
}
