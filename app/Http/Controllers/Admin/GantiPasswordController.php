<?php

namespace App\Http\Controllers\Admin;

use App\Services\ResponseService;
use App\Http\Requests\Admin\GantiPasswordRequest;
use Illuminate\Support\Facades\Log;

class GantiPasswordController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Ganti Password';


    public function index()
    {
        return view('admin.contents.profil.ganti-password');
    }

    public function ubah(GantiPasswordRequest $request)
    {
        try {
            $request->user()->update(['password' => $request->new_password]);
            return ResponseService::successWithMessage(
                'Password berhasil diganti.', 'gantiPassword.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Password gagal diganti.', 'gantiPassword.index'
            );
        }
    }
}
