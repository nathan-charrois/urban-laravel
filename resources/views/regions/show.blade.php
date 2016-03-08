@extends('layouts.public')
@section('title', 'View Region')

@section('content')
	<div class="row">
		<h2>{{ $region->street }} <small>{{ $region->state }}</h2>
		<p>{{$region->price}}</p>
		<hr />
		<p>{!! $region->description !!}</p>
		<h3>Photos</h3>
		@foreach($region->photos as $photo)
			<img src="/{{ $photo->thumbnail_path }}" />
			<form method="POST" action="/photos/{{ $photo->id }}" style="display:inline-block;">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="DELETE" />
				<button type="submit">Delete</button>
			</form>
		@endforeach 

		@if ($user && $user->owns($region))
			<h3>Add Photos</h3>
			<form id="photos" action="/{{ $region->zip }}/{{ $region->street }}/photos" method="POST" class="dropzone">
				{{ csrf_field() }}
			</form>
		@endif
	</div>
@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

	<script>
		Dropzone.options.photos = {
			paramName: 'photo',
			maxFileSize: 3, // Mb
			acceptedFiles: '.jpg, .jpeg, .png, .gif'
		}
	</script>
@stop