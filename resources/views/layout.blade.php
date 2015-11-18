<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<div class="container">
		<ul class="nav nav-pills">
			<li role="presentation"><a href="/">Home</a></li>
			<li role="presentation"><a href="/regions/create">Create</a></li>
		</ul>
		@include('elements.flash')
		@yield('content')
	</div>
</body>
</html>