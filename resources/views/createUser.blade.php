@extends('templates.main')

@section('content')
			<h2>Register</h2>
			
			{!! Form::open(array('url' => 'users')) !!}
				<fielset>
					{!! Form::label('username', 'Username')!!}
					{!! Form::text('username') !!}
					{!! $errors->first('username','<p class="error">:message</p>') !!}

					{!! Form::label('firstname', 'First name') !!}
					{!! Form::text('firstname') !!}
					{!! $errors->first('firstname','<p class="error">:message</p>') !!}

					{!! Form::label('lastname', 'Last name') !!}
					{!! Form::text('lastname') !!}
					{!! $errors->first('lastname','<p class="error">:message</p>') !!}

					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email') !!}

					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password') !!}
					{!! $errors->first('password','<p class="error">:message</p>') !!}

					{!! Form::label('password_confirmation', 'Confirm Password') !!}
					{!! Form::password('password_confirmation') !!}
					{!! $errors->first('password_confirmation','<p class="error">:message</p>') !!}
	
					<input type="submit" value="Register">
				</fielset>
			{!! Form::close() !!}
@stop	

