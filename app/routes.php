<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('/simon', 'HomeController@showSimon');

Route::get('/buttonmash', 'HomeController@showButtonMash');

Route::get('/posts', 'PostsController@index');

Route::get('/posts/manage', 'PostsController@getManage');

Route::get('/posts/list', 'PostsController@getList');

// Login and logout
Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');

Route::get('/about', 'HomeController@about');

Route::resource('posts', 'PostsController');

Route::get('orm-test', function()
{
    
});



