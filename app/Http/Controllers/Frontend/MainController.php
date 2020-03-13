<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class MainController extends Controller
{
    /**
     * Show home index
     *
     * @return void
     */
    public function showBlogIndex()
    {
        $posts = Post::published()->latest()->paginate(6);
        return view('miniblog.home.index', [
            'posts' => $posts,
        ]);
    }
}
