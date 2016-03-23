@extends('layouts.public')
@section('title', 'Create Region')

@section('content')
<section class="content-container">
	<div class="site-wrap">
		<header class="row">
            <div class="column">
                <h1 class="heading-page">@yield('title')</h1>
            </div>
        </header>
		<form method="POST" action="/regions" enctype="multipart/formdata">
			@include('elements.errors')
			@include('regions.form')
		</form>
	</div>
</section>
@stop