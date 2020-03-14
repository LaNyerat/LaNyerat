<?php

namespace App\Services;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

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
        $tags = Tag::with('posts')->latest()->limit(20)->get();
        $post->increment('view', 1);

        return view('miniblog.blog.single', [
            'populars' => $populars,
            'post' => $post,
            'tags' => $tags
        ]);
    }

    /**
     * Show post by search query
     * 
     * Need more improvement
     *
     * @param Request $request
     * @return View
     */
    public function showBySearch(Request $request)
    {
        if($request->tag) {
            $tag = Tag::whereName($request->tag)->first();
            $posts = Post::with('tags')->whereHas('tags', function($q) use ($tag) {
                $q->whereId($tag->id);
            })->published()->latest()->paginate(6);
            if($tag && $posts->count() > 0)
                $error = null;
            else 
                $posts = null;
                $error = 'Not found posts with ' . '<b>' . $request->tag . '</b>' . ' tags';
        } elseif($request->q) {
            $posts = Post::where('title', 'like', '%' . $request->q . '%')->published()->latest()->paginate();
            $error = null;

            if($posts->count() > 0)
                $error = null;
            else
                $posts = null;
                $error = 'Posts ' . '<b>' . $request->q . '</b>' . ' not found';
        } else {
            abort(404);
        }

        return view('miniblog.home.index', [
            'posts' => $posts,
            'error' => $error
        ]);
    }
}