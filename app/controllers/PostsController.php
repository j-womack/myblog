<?php

class PostsController extends \BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Post::with('user');

		if (Input::has('search')) {

			$search = Input::get('search');

			$query->where('title', 'like', "%$search%");
			$query->orwhereHas('user', function($q) use ($search) {
				$q->where('email', 'like', "%$search%");
			});

		}



		$posts = $query->orderBy('created_at', 'desc')->paginate(5);
		return View::make('posts.index')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	    	Session::flash('errorMessage', 'Something went wrong.');

			return Redirect::back()->withInput()->withErrors($validator);
	    } else {
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->user_id = Auth::id();
			$post->save();

			Log::info('Success: ' ,['title' => $post->title, 'body' => $post->body]);

			Session::flash('successMessage', 'You created a post successfully');

			return Redirect::action('PostsController@index');
	    }


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);

		if ($post) {
			return View::make('posts.show')->with('post', $post);
		}

		App::abort(404);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find($id);

		if(!$post) {
			Session::flash('errorMessage', "Post not found");
			App::abort(404);
		}

		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->save();

		Session::flash('successMessage', 'You edited this post successfully');

		return Redirect::action('PostsController@show', $post->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();

		return Redirect::action('PostsController@index');		
	}


}
