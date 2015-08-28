@extends('layouts.master')

@section('title')
Create Blog Post
@stop

@section('style')

@stop

@section('heading')
    Create a New Post
@stop

@section('subheading')
    ...
@stop

@section('image_url')
'/img/pen.jpg'
@stop

@section('content')

    {{ Form::open(array('action' => 'PostsController@store','files'=>true)) }}
    
        @include('posts.create-edit-form')

    {{ Form::close() }}
@stop