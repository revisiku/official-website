<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\ResponseService;
use App\Http\Requests\Admin\AkunRequest;
use Illuminate\Support\Facades\Log;

class AkunController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Akun';


    public function index()
    {
        $akun = User::latest()
            ->whereNot('id', 1)
            ->whereNot('id', auth()->id())
            ->get();

        return view('admin.contents.akun.index',
            compact('akun')
        );
    }

    public function simpan(AkunRequest $request)
    {
        try {
            User::create($request->validated());
            return ResponseService::successWithMessage(
                'Akun berhasil ditambah.', 'akun.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Akun gagal ditambah.', 'akun.index'
            );
        }
    }

    public function edit(User $akun)
    {
        return view('admin.contents.akun.edit', compact('akun'));
    }

    public function ubah(AkunRequest $request, User $akun)
    {
        try {
            $akun->update($request->validated() + ['is_active' => ($request->is_active ? 1 : 0)]);
            return ResponseService::successWithMessage('Akun berhasil diedit.', 'akun.index');
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Akun gagal diedit.', 'akun.edit', $akun->id
            );
        }
    }

    public function hapus(User $akun)
    {
        try {
            $akun->delete();
            return ResponseService::successWithMessage('Akun berhasil dihapus.', 'akun.index');
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Akun gagal dihapus.', 'akun.index'
            );
        }
    }
}
