{{ Form::label('email', 'Email') }}
{{ Form::email('email', null, ['class' => 'form-control']) }}

{{ Form::label('password', 'Password') }}
{{ Form::password('password', null, ['class' => 'form-control']) }}

<button class="btn btn-default">Login</button>