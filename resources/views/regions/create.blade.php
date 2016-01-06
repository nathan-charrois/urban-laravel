@extends('layout')

@section('content')
	<div class="row">
		<h2>Create Region</h2>
		<hr />
		<form method="POST" action="/regions" enctype="multipart/formdata" class="col-md-6">
			@include('elements.errors')
			@include('regions.form')
		</form>
	</div>
@stop