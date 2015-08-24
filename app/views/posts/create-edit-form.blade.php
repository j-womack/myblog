{{ Form::label('title', 'Title') }}
{{ Form::text('title', null, ['class' => 'form-control']) }}

{{ Form::label('body', 'Body') }}
{{ Form::textarea('body', null, ['class' => 'form-control']) }}

<button class="btn btn-default">Save</button>