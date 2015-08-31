<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showLogin()
	{
		return View::make('posts.login');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showSimon()
	{
		return View::make('simon');
	}

	public function showButtonMash()
	{
		return View::make('buttonmash');
	}

	public function doLogin()
	{
		$email		= Input::get('email');
		$password	= Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    return Redirect::intended('/');
		} else {
			Session::flash('errorMessage', 'Login failed.');
			Log::error('Failed login');
		    return Redirect::action('HomeController@showLogin');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Session::flash('','Logout successful');
		return Redirect::to('/');
	}

	public function about()
	{
		return View::make('about');
	}
}
