@extends('templates.main')

@section('content')
			<h2>My profile</h2>

			<h5>Username:</h5>
			<h4>{{$user->username}}</h4>

			<h5>Firstname:</h5>
			<h4>{{$user->firstname}}</h4>

			<h5>Lastname:</h5>
			<h4>{{$user->lastname}}</h4>

			<h5>Email:</h5>
			<h4>{{$user->lastname}}</h4>

@stop	

