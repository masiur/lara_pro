<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>
    </ul>
</nav>

<h1>Edit {{ $nerd->name }}</h1>

{{ HTML::ul($errors->all()) }}
{{ Form::model($nerd, array('route' => array('nerds.update', $nerd->id), 'method' => 'PUT' )) }}

<div class="form-group">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', null, array('class' => 'form-control' )) }}
</div>

<div class="form-group">
	{{ Form::label('email', 'Email') }}
	{{ Form::email('email', null, array('class' => 'form-control' )) }}
</div>

<div class='form-group'>
	{{ Form::label('nerd_level', 'Nerd Level') }}
	{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Football Fanatic', '3' => 'Basement Dweller' ),null,  array('class' => 'form-control')) }}
</div>
{{ Form::submit('Edit this Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</body>
</html>