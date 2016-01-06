<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
</head>
<body>
	<div class="container">
		<div class="clearfix">
		<ul class="nav nav-pills pull-left">
			<li role="presentation"><a href="/">Home</a></li>
			<li role="presentation"><a href="/regions/create">Create</a></li>

		</ul>
		@if ($signedIn)
			<ul class="nav nav-pills pull-right">
				<li role="presentation"><a href="#">Hey, {{ $user->name }}</a></li>
				<li role="presentation"><a href="/auth/logout">Logout</a></li>
			</ul>
		@else
			<ul class="nav nav-pills pull-right">
				<li role="presentation"><a href="/auth/login">Login</a></li>
				<li role="presentation"><a href="/auth/register">Register</a></li>
			</ul>
		@endif
		</div>
		@include('elements.flash')
		@yield('content')
		@yield('scripts')
	</div>
</body>
</html>