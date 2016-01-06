@extends('layout')

@section('content')
	<div class="row">
		<h2>Login</h2>
		<hr />
		<form method="POST" action="/auth/login">
			{!! csrf_field() !!}

			@include('elements.errors')

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="remember">Remember Me?</label>
				<input type="checkbox" name="remember" id="remember">
			</div>
			<div class="form-gorup">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
	</div>
@stop