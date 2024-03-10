<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class BannerController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Banner';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/banners/');
    }

    public function index()
    {
        $banner = Banner::latest()->get();

        return view('admin.contents.banner.index',
            compact('banner')
        );
    }

    public function tambah()
    {
        return view('admin.contents.banner.tambah');
    }

    public function simpan(BannerRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->upload->moveEncrypt($request->file('image'));
            $validated['image'] = $this->upload->getFullPath();

            Banner::create($validated + [
                'is_new_window' => ($request->is_new_window ? true : false),
                'is_publish'    => ($request->is_publish ? true : false),
            ]);

            return ResponseService::successWithMessage(
                'Banner berhasil ditambah.', 'banner.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Banner gagal ditambah.', 'banner.index'
            );
        }
    }

    public function edit(Banner $banner)
    {
        return view('admin.contents.banner.edit',
            compact('banner')
        );
    }

    public function ubah(BannerRequest $request, Banner $banner): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->has('image')) {
                $this->upload->delete($banner->image);
                $this->upload->moveEncrypt($request->file('image'));
                $validated['image'] = $this->upload->getFullPath();
            }

            $banner->update($validated + [
                'is_new_window' => ($request->is_new_window ? true : false),
                'is_publish'    => ($request->is_publish ? true : false),
            ]);

            return ResponseService::successWithMessage(
                'Banner berhasil diedit.', 'banner.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Banner gagal diedit.', 'banner.edit', $banner->id
            );
        }
    }

    public function hapus(Banner $banner): RedirectResponse
    {
        try {
            $this->upload->delete($banner->image);

            $banner->delete();

            return ResponseService::successWithMessage(
                'Banner berhasil dihapus.', 'banner.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Banner gagal dihapus.', 'banner.index'
            );
        }
    }
}
