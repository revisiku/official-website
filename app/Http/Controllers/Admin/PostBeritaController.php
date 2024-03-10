<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\PostKategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PostBeritaController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Berita';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/posts/');
    }

    public function index()
    {
        $berita = Post::select(Post::adminTableFields())
            ->where('type', Post::TYPE[1])
            ->latest()
            ->get();

        return view('admin.contents.post.berita.index',
            compact('berita')
        );
    }

    public function tambah()
    {
        $kategori = PostKategori::where('type', 'umum')
            ->orWhere('type', Post::TYPE[1])
            ->get();

        return view('admin.contents.post.berita.tambah',
            compact('kategori')
        );
    }

    public function simpan(PostRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->upload->moveEncrypt($request->file('cover'));
            $validated['cover'] = $this->upload->getFullPath();

            Post::create($validated + [
                'user_id'           => auth()->id(),
                'post_kategori_id'  => $request->post_kategori_id,
                'published_at'      => ($request->is_publish ? now() : null),
                'is_publish'        => ($request->is_publish ? true : false),
                'slug'              => $request->title,
                'type'              => Post::TYPE[1],
            ]);

            return ResponseService::successWithMessage(
                'Berita berhasil ditambah.', 'post.berita.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Berita gagal ditambah.', 'post.berita.tambah'
            );
        }
    }

    public function edit(Post $post)
    {
        $kategori = PostKategori::where('type', 'umum')
            ->orWhere('type', Post::TYPE[1])
            ->get();

        return view('admin.contents.post.berita.edit',
            compact(
                'post',
                'kategori'
            )
        );
    }

    public function ubah(PostRequest $request, Post $post): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->has('cover')) {
                $this->upload->delete($post->cover);
                $this->upload->moveEncrypt($request->file('cover'));
                $validated['cover'] = $this->upload->getFullPath();
            }

            if ($request->is_publish && !$post->published_at) {
                $validated['published_at'] = now();
            }

            $post->update($validated + [
                'post_kategori_id'  => $request->post_kategori_id,
                'is_publish'        => ($request->is_publish ? true : false),
                'slug'              => $request->title,
            ]);

            return ResponseService::successWithMessage(
                'Berita berhasil diedit.', 'post.berita.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Berita gagal diedit.', 'post.berita.edit', $post->id
            );
        }
    }

    public function hapus(Post $post): RedirectResponse
    {
        try {
            $this->upload->delete($post->cover);

            $post->delete();

            return ResponseService::successWithMessage(
                'Berita berhasil dihapus.', 'post.berita.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Berita gagal dihapus.', 'post.berita.index'
            );
        }
    }
}
