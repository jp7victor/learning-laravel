@extends('layout.default')

@section ('content')
	
		<h1>Create New User</h1>

		{{ Form::open(['route' => 'users.store']) }}
			<div>

				{{ Form::label ('username', 'Username: ') }}
				{{ Form::text('username') }}
				{{ $errors->first('username') }}

			</div>	
			

			<div>

				{{ Form::label ('password', 'Password: ') }}
				{{ Form::password('password') }}
				
			</div>		

			<div>

				{{ Form::label ('email', 'Email: ') }}
				{{ Form::email('email') }}
				
			</div>	

		<div>{{ Form::submit('Create User') }}</div>

	{{ Form::close() }}

@stop


	


