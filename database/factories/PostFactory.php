<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Post::class, function (Faker $faker) {
    $user = User::all()->toArray();
    $userId = Arr::pluck($user, 'id');
    return [
        'title' => $faker->sentence($nbWords = 7, $variableNbWords = true),
        'content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'slug' => $faker->slug(),
        'image' => 'img_' . rand(1, 4) . '.jpg',
        'status' => 'published',
        'user_id' => collect($userId)->random(),
        'published_at' => Carbon::now()
    ];
});
