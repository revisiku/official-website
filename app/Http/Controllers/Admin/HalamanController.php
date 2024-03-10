<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\HalamanRequest;
use App\Models\Halaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class HalamanController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Halaman Website';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/posts/');
    }

    public function edit(Halaman $halaman)
    {
        return view('admin.contents.halaman.edit',
            compact('halaman')
        );
    }

    public function ubah(HalamanRequest $request, Halaman $halaman): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->has('cover')) {
                $this->upload->delete($halaman->cover);
                $this->upload->moveEncrypt($request->file('cover'));
                $validated['cover'] = $this->upload->getFullPath();
            }

            $halaman->update($validated);

            return ResponseService::successWithMessage(
                'Halaman berhasil diedit.', 'halaman.edit', $halaman->id
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Halaman gagal diedit.', 'halaman.edit', $halaman->id
            );
        }
    }
}
