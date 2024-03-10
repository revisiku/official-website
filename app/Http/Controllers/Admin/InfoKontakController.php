<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfoKontakRequest;
use App\Services\ResponseService;
use App\Models\Kontak;
use Illuminate\Support\Facades\Log;

class InfoKontakController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Informasi Kontak';

    private $kontak;


    public function __construct()
    {
        parent::__construct();
        $this->kontak = Kontak::where('id', 1)->first();
    }


    public function index()
    {
        return view('admin.contents.info_kontak.index', [
            'kontak' => $this->kontak
        ]);
    }

    public function ubah(InfoKontakRequest $request)
    {
        try {
            $this->kontak->update($request->validated());
            return ResponseService::successWithMessage(
                'Informasi Kontak berhasil diperbaharui.', 'infoKontak.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Informasi Kontak gagal diperbaharui.', 'infoKontak.index'
            );
        }
    }
}
