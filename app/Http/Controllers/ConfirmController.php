<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ConfirmController extends Controller
{

    public function __invoke()
    {
        if (request()->code === config('app.confirm_code')) {
            Session::put('isConfirmed', true);
            return redirect()->route('login.index');
        }

        return redirect('/');
    }
}
