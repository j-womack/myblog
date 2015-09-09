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

        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}

        <label for="body">Body</label>
                
        <div class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <textarea class="wmd-input form-control" name="body" cols="50" rows="10" id="wmd-input">{{ $post->body }}</textarea>
        </div>
        <label>Preview:</label>
        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>


        {{ Form::label('file','File',array('id'=>'','class'=>'')) }}
        {{ Form::file('file','',array('id'=>'','class'=>'')) }}
        <br/>

        <button class="btn btn-default">Save</button>

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