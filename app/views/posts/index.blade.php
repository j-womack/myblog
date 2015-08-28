@extends('layouts.master')

@section('title')
    The Blog
@stop

@section('heading')
    noisefights
@stop

@section('subheading')
    Assorted musings
@stop

@section('image_url')
    '/img/about/about{{ Post::randomAbout() }}.jpg'
@stop

@section('content')
    {{ $posts->appends(array('search' => Input::get('search')))->links() }}

    <h1>Blog posts</h1>
    @foreach($posts as $post)
        <h2><a href="{{{ action('PostsController@show', $post->id) }}}">{{ strip_tags($post->title) }}</a></h2>
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