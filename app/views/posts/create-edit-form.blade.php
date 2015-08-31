{{ Form::label('title', 'Title') }}
{{ Form::text('title', null, ['class' => 'form-control']) }}

<label for="body">Body</label>
        
<div class="wmd-panel">
    <div id="wmd-button-bar"></div>
    <textarea class="wmd-input form-control" name="body" cols="50" rows="10" id="wmd-input">
This is the *second* editor.
------------------------------

It has a plugin hook registered that surrounds all words starting with the
letter A with asterisks before doing the Markdown conversion. Another one gives bare links
a nicer link text. User input isn't sanitized here:

<marquee>I'm the ghost from the past!</marquee>

http://google.com

http://stackoverflow.com

It also includes a help button.
    </textarea>
</div>
<label>Preview:</label>
<div id="wmd-preview" class="wmd-panel wmd-preview"></div>


{{ Form::label('file','File',array('id'=>'','class'=>'')) }}
{{ Form::file('file','',array('id'=>'','class'=>'')) }}
<br/>

<button class="btn btn-default">Save</button>