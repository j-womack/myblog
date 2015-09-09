@extends('layouts.master')

@section('title')
A Blog
@stop

@section('heading')
noisefights
@stop

@section('subheading')
Assorted musings
@stop

@section('image_url')
'/img/header/coffee{{ Post::randomCoffee() }}.jpg'
@stop

@section('credit')
<span class="jomando jback">Coffee photos by: <a href="http://instagram.com/jomando" class="jomando">@jomando</a></span>
@stop

@section('content')
    {{ $posts->appends(array('search' => Input::get('search')))->links() }}

    <h1>Blog posts</h1>
    @foreach($posts as $post)
        <div class="row">
            <h2 class="col-xs-6"><a href="{{{ action('PostsController@show', $post->id) }}}">{{ strip_tags($post->title) }}</a></h2>
            <span class="text-right col-xs-6">Tags: <em>
                @foreach ($post->tags as $tag)
                    {{{ $tag->name }}}
                @endforeach
            </em></span><br>
        </div>
        <span>{{{ $post->created_at->diffforhumans() }}} /// By: {{{ $post->user->firstName }}}</span>
        <p>{{ strip_tags($post->body) }}</p>
    @endforeach

    {{ $posts->links() }}
@stop

@section('style')
<style>
    h1 {
        text-align: center
    }
</style>
@stop