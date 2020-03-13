<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach($posts as $post) {
            $post->tags()->attach([rand(1, 10)]);
        }
    }
}
