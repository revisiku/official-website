<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesan;
use App\Models\User;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Log;

class PesanController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Pesan';


    public function index()
    {
        return view('admin.contents.pesan.index', [
            'pesan' => Pesan::with('user')->latest()->get()
        ]);
    }

    public function detail(Pesan $pesan)
    {
        if (!$pesan->isReaded()) {
            $pesan->update([
                'is_readed' => true,
                'readed_by' => auth()->id()
            ]);
        }

        return view('admin.contents.pesan.detail',
            compact('pesan')
        );
    }

    public function hapus(User $akun)
    {
        try {
            $akun->delete();

            return ResponseService::successWithMessage(
                'Akun berhasil dihapus.', 'pesan.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Akun gagal dihapus.', 'pesan.edit'
            );
        }
    }
}
