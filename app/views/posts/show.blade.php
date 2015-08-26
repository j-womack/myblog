@extends('layouts.master')

@section('title')
The Blog
@stop

@section('heading')
    {{ $post->title }}
@stop

@section('subheading')
    by: {{{ $post->user->email }}}
@stop

@section('content')
    <p>
        /// <strong>{{ $post->title }}</strong> <br>
        /// <em>by: {{{ $post->user->email }}}</em> <br>
        /// <em>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</em>
    </p>
    <p>{{ $post->body }}</p>

    @if (Auth::check() && Auth::id() == $post->user->id)
        <div>
            <a href="{{{ action('PostsController@edit', $post->id) }}}" class="btn btn-default">Edit Post</a>
            <button id="delete" class="btn btn-danger">Delete</button>
        </div>
    @endif
    {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete')) }}
    {{ Form::close() }}

@stop

@section('js')
    <script>
    (function(){
        "use strict";
        
        $('#delete').on('click', function(){
            var onConfirm = confirm('Are you sure you want to delete this post?');

            if (onConfirm) {
                $('#formDelete').submit();
            }
        });
    })();
    </script>
@stop



