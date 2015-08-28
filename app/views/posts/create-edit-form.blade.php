{{ Form::label('title', 'Title') }}
{{ Form::text('title', null, ['class' => 'form-control']) }}

{{ Form::label('body', 'Body') }}
{{ Form::textarea('body', null, ['class' => 'form-control']) }}

{{ Form::label('file','File',array('id'=>'','class'=>'')) }}
{{ Form::file('file','',array('id'=>'','class'=>'')) }}
<br/>

<button class="btn btn-default">Save</button>