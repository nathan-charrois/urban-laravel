@extends('layouts.public')
@section('title', 'Create User')

@section('content')
	<section class="content-container">
		<div class="site-wrap">
			<header class="row">
				<div class="column">
					<h1 class="heading-page">@yield('title')</h1>
				</div>
			</header>
			<form action="/users" method="POST">
				@include('elements.errors')
				
				{!! csrf_field() !!}

				<fieldset>
					<div class="row">
						<div class="column">
							<h3 class="heading-section">Details</h3>
						</div>
					</div>
	                <div class="row">
	                    <div class="input-container">
	                        <div class="small-12 medium-4 large-3 columns">
	                            <label for="email">Email:</label>
	                        </div>
	                        <div class="small-12 medium-8 large-6 columns end">
	                            <input type="text" name="email" id="email" />
	                        </div>
	                    </div>
	                </div>
					<div class="row">
	                    <div class="input-container">
	                        <div class="small-12 medium-4 large-3 columns">
	                            <label for="email">Password:</label>
	                        </div>
	                        <div class="small-12 medium-8 large-6 columns end">
	                            <input type="text" name="password" id="password" />
	                        </div>
	                    </div>
	                </div>
					<div class="row">
	                    <div class="input-container">
	                        <div class="small-12 medium-4 large-3 columns">
	                            <label for="email">Confirm Password:</label>
	                        </div>
	                        <div class="small-12 medium-8 large-6 columns end">
	                            <input type="text" name="password_confirmation" id="password_confirmation" />
	                        </div>
	                    </div>
	                </div>
					<div class="row">
	                    <div class="input-container">
	                        <div class="small-12 medium-4 large-3 columns">
	                            <label for="email">Account:</label>
	                        </div>
	                        <div class="small-12 medium-8 large-6 columns end">
                                <div class="checkbox-container mtm">
                                    <input type="hidden" name="verified" data-input="verified" />
                                    <label class="input-checkbox-label">
                                        <span class="input-checkbox" data-input="verified"></span>
                                     	Verified
                                    </label>
                                </div>						
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="small-12 medium-offset-8 medium-4 large-offset-3 large-2 columns">
	                        <button id="submit" class="large-12 fill button button-primary">
	                            Save
	                        </button>
	                    </div>
	                </div>
				</fieldset>
			</form>
		</div>
	</section>
@stop