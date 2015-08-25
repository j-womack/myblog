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

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name?}', function($name = 'world')
{
    return 'Hello ' . $name . '.';
});

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', function()
{
    return 'This is my portfolio.';
});

Route::get('/rolldice/{guess}', function ($guess)
{
    $data = array('guess' => $guess);
    return View::make('roll-dice')->with($data);
});

Route::get('/myfirstview/{name}', function($name)
{
    return View::make('my-first-view')->with('name', $name);
});

Route::get('/calculator', function()
{
    return View::make('calculator');
});

Route::get('/konami', function()
{
    return View::make('konami');
});

Route::get('/posts', 'PostsController@index');

// Login and logout
Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');



Route::resource('posts', 'PostsController');

Route::get('orm-test', function()
{
    
});



