<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\PublicController;
use App\Models\Post;
use App\Models\Stat\PostVisitor;
use App\Services\VisitorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends PublicController
{

    protected $pageName = 'Blog';

    private $postPerPage = 5;

    public function index_blog()
    {
        $posts = Post::select((new Post)->publicFields($this->langField))
            ->with('postCategory:id,'.$this->langField.'name as name')
            ->when(request()->search, function($query) {
                return $query->where('title', 'LIKE', '%'.request()->search.'%')
                    ->orWhere('short', 'LIKE', '%'.request()->search.'%')
                    ->orWhere('body', 'LIKE', '%'.request()->search.'%')
                    ->orWhere('en_title', 'LIKE', '%'.request()->search.'%')
                    ->orWhere('en_short', 'LIKE', '%'.request()->search.'%')
                    ->orWhere('en_body', 'LIKE', '%'.request()->search.'%');
            }, fn ($query) => $query->latestPublishByType(Post::TYPE[0]))
            ->paginate($this->postPerPage)->withQueryString();

        $popularPosts = Post::select((new Post)->publicFields($this->langField))
            ->popularPublish(Post::TYPE[0])
            ->limit(5)
            ->get();

        return view('public.contents.post.blog_index',
            compact(
                'posts',
                'popularPosts'
            )
        );
    }

    public function post_detail(Request $request)
    {
        $post = Post::select((new Post)->publicFields($this->langField))
            ->with('postCategory:id,'.$this->langField.'name as name')
            ->when(!request()->review, fn ($query) => $query->publish())
            ->where('type', Post::TYPE[0])
            ->where('slug', $request->slug)
            ->first();

        if ($post) {
            if (!Session::has('readed_posts')) Session::put('readed_posts', []);
            if (!in_array($post->slug, Session::get('readed_posts'))) {
                if (Session::push('readed_posts', $post->slug)) return true;

                if ($post->update(['hits' => ($post->hits+1)])) {
                    PostVisitor::visitorChecker($post->id);
                }

            }
        } else {
            return view('public.contents.post.404');
        }

        $latestPosts = Post::select((new Post)->publicFields($this->langField))
            ->latestPublishByType(Post::TYPE[0])
            ->limit(3)
            ->get();

        return view('public.contents.post.detail',
            compact(
                'post',
                'latestPosts'
            )
        );
    }
}
