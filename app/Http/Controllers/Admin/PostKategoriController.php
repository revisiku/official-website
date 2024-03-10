<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostKategori;
use App\Services\ResponseService;
use App\Http\Requests\Admin\PostKategoriRequest;
use Illuminate\Support\Facades\Log;

class PostKategoriController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Kategori';


    public function index()
    {
        $postKategori = PostKategori::all();
        $tipe = PostKategori::TYPE;

        return view('admin.contents.post.kategori.index',
            compact(
                'postKategori',
                'tipe'
            )
        );
    }

    public function simpan(PostKategoriRequest $request)
    {
        try {
            PostKategori::create($request->validated() + ['slug' => $request->name]);
            return ResponseService::successWithMessage(
                'Kategori berhasil ditambah.', 'post.kategori.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Kategori gagal ditambah.', 'post.kategori.index'
            );
        }
    }

    public function edit(PostKategori $postKategori)
    {
        $tipe = PostKategori::TYPE;

        return view('admin.contents.post.kategori.edit',
            compact(
                'postKategori',
                'tipe'
            )
        );
    }

    public function ubah(PostKategoriRequest $request, PostKategori $postKategori)
    {
        try {
            $postKategori->update(
                $request->validated() + ['slug' => $request->name]
            );

            return ResponseService::successWithMessage(
                'Kategori berhasil diedit.', 'post.kategori.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Kategori gagal diedit.', 'post.kategori.edit', $postKategori->id
            );
        }
    }

    public function hapus(PostKategori $postKategori)
    {
        try {
            $postKategori->delete();

            return ResponseService::successWithMessage(
                'Kategori berhasil dihapus.', 'post.kategori.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Kategori gagal dihapus.', 'post.kategori.index'
            );
        }
    }
}
