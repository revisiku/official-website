<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\PartnershipRequest;
use App\Models\Partnership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PartnershipController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Partnership';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/');
    }

    public function index()
    {
        $partnership = Partnership::latest()->get();

        return view('admin.contents.partnership.index',
            compact('partnership')
        );
    }

    public function tambah()
    {
        return view('admin.contents.partnership.tambah');
    }

    public function simpan(PartnershipRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->upload->moveEncrypt($request->file('image'));
            $validated['image'] = $this->upload->getFullPath();

            Partnership::create($validated + [
                'is_publish'    => ($request->is_publish ? true : false),
            ]);

            return ResponseService::successWithMessage(
                'Data partnership berhasil ditambah.', 'partnership.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Data partnership gagal ditambah.', 'partnership.index'
            );
        }
    }

    public function edit(Partnership $partnership)
    {
        return view('admin.contents.partnership.edit',
            compact('partnership')
        );
    }

    public function ubah(PartnershipRequest $request, Partnership $partnership): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->has('image')) {
                $this->upload->delete($partnership->image);
                $this->upload->moveEncrypt($request->file('image'));
                $validated['image'] = $this->upload->getFullPath();
            }

            $partnership->update($validated + [
                'is_publish'    => ($request->is_publish ? true : false),
            ]);

            return ResponseService::successWithMessage(
                'Data partnership berhasil diedit.', 'partnership.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Data partnership gagal diedit.', 'partnership.edit', $partnership->id
            );
        }
    }

    public function hapus(Partnership $partnership): RedirectResponse
    {
        try {
            $this->upload->delete($partnership->image);

            $partnership->delete();

            return ResponseService::successWithMessage(
                'Data partnership berhasil dihapus.', 'partnership.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Data partnership gagal dihapus.', 'partnership.index'
            );
        }
    }
}
