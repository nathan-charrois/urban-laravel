@extends('layout')

@section('content')
	<div class="row">
		<h2>Register</h2>
		<hr />

		<form method="POST" action="/auth/register">
			{!! csrf_field() !!}

			@include('elements.errors')

			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password_confirmation">Password Confirm:</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
			</div>
			<div class="form-gorup">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
	</div>
@stop