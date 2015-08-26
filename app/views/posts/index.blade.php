@extends('layouts.master')

@section('title')
The Blog
@stop

@section('heading')
    Josh
@stop

@section('subheading')
    This is a blog.
@stop

@section('content')
    {{ $posts->appends(array('search' => Input::get('search')))->links() }}

    <h1>Blog posts</h1>
    @foreach($posts as $post)
        <h2><a href="{{{ action('PostsController@show', $post->id) }}}">{{ strip_tags($post->title) }}</a></h2>
        <span>{{{ $post->created_at->diffforhumans() }}} /// {{{ $post->user->email }}}</span>
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