<?php

namespace App\Services;

use App\Post;

class PostService {
    /**
     * Show post single page
     *
     * @param Post $post
     * @return View
     */
    public function showPostSingle(Post $post)
    {
        $populars = Post::published()->orderBy('view', 'desc')->take(5)->get();
        $post->update(['view' => ($post->view ?? 0) + 1]);

        return view('miniblog.blog.single', [
            'populars' => $populars,
            'post' => $post
        ]);
    }
}