<!DOCTYPE html>
<html>
<head>
	<title>Login with laravel 4.2 || by Masiur</title>
</head>
<body>

{{ Form::open(array('url' => 'login' )) }}
<h1>Login</h1>

<!-- if there is any login error , we gotta show them here -->

<p>
	{{ $errors->first('email') }}
	{{ $errors->first('password')  }}
</p>

<p>
	{{ Form::label('email', 'Email Address') }}
	{{ Form::text('email', Input::old('email'), array('placeholder' => 'mail@example.com')) }}
</p>

<p>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
</p>

<p> {{ Form::submit('Submit') }}</p>
{{ Form::close() }}
<!-- Logout -->
<a href"{{URL::to('logout')  }}"> Logout</a>
</body>
</html>