@extends('layouts.master')

@section('title')
The Blog
@stop

@section('content')
    {{ $posts->links() }}

    <h1>Blog posts</h1>
    @foreach($posts as $post)
        <h2><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></h2>
        <span>{{{ $post->created_at->diffforhumans() }}}</span>
        <p>{{{ $post->body }}}</p>
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