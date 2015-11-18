@extends('layout')

@section('content')
	<h2>Create Region</h2>
	<div class="row">
		<form method="POST" action="/regions" enctype="multipart/formdata" class="col-md-6">
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@include('regions.form')
		</form>
	</div>
@stop