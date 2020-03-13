<?php

use Illuminate\Support\Facades\Route;

/**
 * This route file handle all routing in backend of application
 * 
 * @author Alfan Jauhari and All Contributors
 */

 Route::post('auth/{provider?}', 'Auth\AuthController@redirectToProvider')->name('auth.redirect'); // Redirect to auth provider
 Route::get('auth/{provider?}/callback', 'Auth\AuthController@providerCallback')->name('auth.callback');
 Route::post('logout', 'Auth\AuthController@logout')->name('auth.logout');