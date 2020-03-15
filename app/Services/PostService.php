<?php

namespace App\Services;

use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Show popular tags
        $tags = $this->popularTags();
        $post->increment('view', 1);

        return view('miniblog.blog.single', [
            'populars' => $populars,
            'post' => $post,
            'tags' => $tags
        ]);
    }

    public function popularTags()
    {
        return PostTag::groupBy('tag_id')->join('tags', 'post_tag.tag_id', 'tags.id')->select([
            'tags.name as name',
            'tag_id',
            DB::raw('count(*) as total')
        ])->orderBy('total', 'desc')->get();
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
            if($tag && $posts->count() > 0) {
                $error = null;
                $title = $request->tag;
            } else { 
                $title = $request->tag;
                $posts = null;
                $error = 'Not found posts with ' . '<b>' . $request->tag . '</b>' . ' tags';
            }
        } elseif($request->q) {
            $posts = Post::where('title', 'like', '%' . $request->q . '%')->published()->latest()->paginate();
            $error = null;

            if($posts->count() > 0) {
                $error = null;
                $title = $request->q;
            } else {
                $title = $request->q;
                $posts = null;
                $error = 'Posts ' . '<b>' . $request->q . '</b>' . ' not found';
            }
        } else {
            abort(404);
        }

        return view('miniblog.blog.search', [
            'posts' => $posts,
            'error' => $error,
            'title' => $title
        ]);
    }
}