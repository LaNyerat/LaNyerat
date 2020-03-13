<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $postService;

    /**
     * Blog controller construct
     *
     * @param PostService $postService (PostService Binding)
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Show post single page
     *
     * @return void
     */
    public function showPostSingle(Post $post)
    {
        return $this->postService->showPostSingle($post);
    }
}
