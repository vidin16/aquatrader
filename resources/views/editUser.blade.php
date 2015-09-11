@extends('templates.main')

@section('content')
			<h2>Edit Profile</h2>
			
			{!! Form::model($user,array('url' => 'users/'.$user->id,'method'=>'put')) !!}
				<fielset>
					{!! Form::label('username', 'Username')!!}
					{!! Form::text('username') !!}
					{!! $errors->first('username','<p class="error">:message</p>') !!} 

					{!! Form::label('firstname', 'First name') !!}
					{!! Form::textarea('firstname') !!}
					{!! $errors->first('firstname','<p class="error">:message</p>') !!}

					{!! Form::label('lastname', 'Last name') !!}
					{!! Form::text('lastname') !!}
					{!! $errors->first('lastname','<p class="error">:message</p>') !!}

					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email') !!}
					{!! $errors->first('email','<p class="error">:message</p>') !!}
	
					<input type="submit" value="Update product">
				</fielset>
			{!! Form::close() !!}
@stop	

