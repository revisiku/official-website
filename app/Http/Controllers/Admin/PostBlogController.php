<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Services\ResponseService;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\PostKategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PostBlogController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Kelola Blog';


    public function __construct(private Upload $upload)
    {
        parent::__construct();
        $this->upload->setPath('assets/uploads/posts/');
    }

    public function index()
    {
        $blog = Post::select(Post::adminTableFields())
            ->where('type', Post::TYPE[0])
            ->latest()
            ->get();

        return view('admin.contents.post.blog.index',
            compact('blog')
        );
    }

    public function tambah()
    {
        $kategori = PostKategori::where('type', 'umum')
            ->orWhere('type', Post::TYPE[0])
            ->get();

        return view('admin.contents.post.blog.tambah',
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
                'type'              => Post::TYPE[0],
            ]);

            return ResponseService::successWithMessage(
                'Blog berhasil ditambah.', 'post.blog.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Blog gagal ditambah.', 'post.blog.tambah'
            );
        }
    }

    public function edit(Post $post)
    {
        $kategori = PostKategori::where('type', 'umum')
            ->orWhere('type', Post::TYPE[0])
            ->get();

        return view('admin.contents.post.blog.edit',
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
                'Blog berhasil diedit.', 'post.blog.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Blog gagal diedit.', 'post.blog.edit', $post->id
            );
        }
    }

    public function hapus(Post $post): RedirectResponse
    {
        try {
            $this->upload->delete($post->cover);

            $post->delete();

            return ResponseService::successWithMessage(
                'Blog berhasil dihapus.', 'post.blog.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Blog gagal dihapus.', 'post.blog.index'
            );
        }
    }
}
