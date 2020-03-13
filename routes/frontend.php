<?php

use App\Post;
use Illuminate\Support\Facades\Route;

/**
 * This route file handle all routing in frontend of application
 * 
 * @author Alfan Jauhari and All Contributors
 */

Route::get('/', 'MainController@showBlogIndex')->name('home.index');

Route::get('show/{post}', 'BlogController@showPostSingle')->name('blog.post');