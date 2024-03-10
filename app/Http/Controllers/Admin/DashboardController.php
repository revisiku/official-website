<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesan;
use App\Models\Post;
use App\Models\Ref\Visitor;
use App\Models\Testimoni;
use App\Models\User;

class DashboardController extends \App\Http\Controllers\AdminController
{

    public function index()
    {
        $adminCount = User::count();
        $blogCount = Post::whereByType(Post::TYPE[0])->count();
        $newsCount = Post::whereByType(Post::TYPE[1])->count();
        $messageCount = Pesan::count();
        $visitorCount = Visitor::doesntHave('logLogin')->count();
        $lastPost = Post::latest()->limit(4)->get();
        $lastTesti = Testimoni::latest()->limit(3)->get();

        return view('admin.contents.dashboard.index',
            compact(
                'adminCount',
                'newsCount',
                'blogCount',
                'messageCount',
                'visitorCount',
                'lastPost',
                'lastTesti',
            )
        );
    }
}
