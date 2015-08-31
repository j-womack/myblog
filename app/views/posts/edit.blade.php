@extends('layouts.master')

@section('title')
Edit Blog Post
@stop

@section('style')
<style type="text/css">
.wmd-preview {
    background-color: #EEE;
    padding: 10px;
    margin-top: 10px;
}
</style>
@stop

@section('heading')
Editor
@stop

@section('subheading')
...
@stop

@section('image_url')
'/img/pen.jpg'
@stop
@section('content')
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}

        @include('posts.create-edit-form')

    {{ Form::close() }}
@stop

@section('js')
<script src="/js/Markdown.Sanitizer.js"></script>
<script src="/js/Markdown.Converter.js"></script>
<script src="/js/Markdown.Editor.js"></script>
<script type="text/javascript">
    (function () {
        
        var converter = new Markdown.Converter();
        
        var editor = new Markdown.Editor(converter);
        
        editor.run();
    })();
</script>
@stop