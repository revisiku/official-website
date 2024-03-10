<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\TestimoniRequest;
use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class TestimoniController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Testimoni';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/testimonials/');
    }

    public function index()
    {
        $testimoni = Testimoni::latest()->get();

        return view('admin.contents.testimoni.index',
            compact('testimoni')
        );
    }

    public function simpan(TestimoniRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->upload->moveEncrypt($request->file('image'));
            $validated['image'] = $this->upload->getFullPath();

            Testimoni::create($validated);

            return ResponseService::successWithMessage(
                'Testimoni berhasil ditambah.', 'testimoni.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Testimoni gagal ditambah.', 'testimoni.tambah'
            );
        }
    }

    public function edit(Testimoni $testimoni)
    {
        return view('admin.contents.testimoni.edit', compact('testimoni'));
    }

    public function ubah(TestimoniRequest $request, Testimoni $testimoni): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->has('image')) {
                $this->upload->delete($testimoni->image);
                $this->upload->moveEncrypt($request->file('image'));
                $validated['image'] = $this->upload->getFullPath();
            }

            $testimoni->update($validated + [
                'is_publish' => $request->is_publish ? true : false
            ]);

            return ResponseService::successWithMessage(
                'Testimoni berhasil diedit.', 'testimoni.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Testimoni gagal diedit.', 'testimoni.edit', $testimoni->id
            );
        }
    }

    public function hapus(Testimoni $testimoni): RedirectResponse
    {
        try {
            $this->upload->delete($testimoni->image);

            $testimoni->delete();

            return ResponseService::successWithMessage(
                'Testimoni berhasil dihapus.', 'testimoni.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Testimoni gagal dihapus.', 'testimoni.index'
            );
        }
    }
}
