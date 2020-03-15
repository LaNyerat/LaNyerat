<?php

use Illuminate\Support\Facades\Route;

/**
 * This route file handle all routing in frontend of application
 * 
 * @author Alfan Jauhari and All Contributors
 */

Route::get('/', 'MainController@showBlogIndex')->name('home.index');

Route::get('read/{post}', 'BlogController@showPostSingle')->name('blog.post');
Route::get('search', 'BlogController@showBySearch')->name('blog.search');
Route::get('tag', function() {
    $post = \App\Post::find('18d6457c-ffda-4231-b2f6-af43c73a38b0');
    $post->tags()->attach([1]);
});