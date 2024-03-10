<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfilRequest;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Log;

class ProfilController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Profil';


    public function index()
    {
        return view('admin.contents.profil.index');
    }

    public function ubah(ProfilRequest $request)
    {
        $fields = ['name', 'email', 'username'];

        try {
            $request->user()->update($request->only($fields));
            return ResponseService::successWithMessage(
                'Profil berhasil diperbaharui.', 'profil.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Profil gagal diperbaharui.', 'profil.index'
            )->withOnly($fields);
        }
    }
}
