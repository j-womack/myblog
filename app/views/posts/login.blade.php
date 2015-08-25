@extends('layouts.master')

@section('title')
Login
@stop

@section('content')

    {{ Form::open(array('action' => 'HomeController@doLogin')) }}
    
        @include('posts.login-form')

    {{ Form::close() }}

@stop