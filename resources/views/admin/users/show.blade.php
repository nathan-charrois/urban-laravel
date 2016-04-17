@extends('layouts.admin')
@section('title', 'Show User')

@section('content')
	<section class="content-container">
		<div class="site-wrap">
			<header class="row">
				<div class="small-12 medium-8 large-10 columns">
					<h1 class="heading-page">@yield('title')</h1>
				</div>
				<div class="small-12 medium-4 large-2 columns">
					<a href="/admin/users/{{ $user->id }}/edit" class="btn-text mtm">Edit User</a>
					<form action="/admin/users/{{ $user->id }}" method="POST" class="inline">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}
						<button type="submit" class="button-text mtm">Delete</button>
					</form>
				</div>
			</header>
			<fieldset>
				<div class="row">
					<div class="large-12 columns">
						<h3 class="heading-section">Location</h3>
					</div>
				</div>
				<div class="row">
	                <div class="input-container">
	                    <div class="small-12 medium-4 large-3 columns">
	                        <label for="city">Default City:</label>
	                    </div>
	                    <div class="small-12 medium-8 large-6 columns end">
							<input type="text" name="city" id="city" value="{{ $user->profile->city }}" disabled/>
	                    </div>
	                </div>
	            </div>
				<div class="row">
					<div class="large-12 columns">
						<h3 class="heading-section">Details</h3>
					</div>
				</div>
				<div class="row">
	                <div class="input-container">
	                    <div class="small-12 medium-4 large-3 columns">
	                        <label for="name">Name:</label>
	                    </div>
	                    <div class="small-12 medium-8 large-6 columns end">
							<input type="text" name="name" id="name" value="{{ $user->profile->name }}" disabled/>
	                    </div>
	                </div>
	            </div>
				<div class="row">
	                <div class="input-container">
	                    <div class="small-12 medium-4 large-3 columns">
	                        <label for="email">Email:</label>
	                    </div>
	                    <div class="small-12 medium-8 large-6 columns end">
							<input type="text" name="email" id="email" value="{{ $user->email }}" disabled/>
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
								<input type="hidden" name="verified" data-input="verified" value="{{ $user->verified }}" disabled/>
								<label class="input-checkbox-label">
									<span class="input-checkbox" data-input="verified"></span>
									Verified
								</label>
							</div>						
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<h3 class="heading-section">About</h3>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<div class="textarea-editor">
                            <textarea rows="5" name="about" class="textarea-editor-body" disabled>{{ $user->profile->about}}</textarea>
                            <div class="textarea-editor-tools">
                                <ul class="tools clearfix">
                                    <li class="tool disabled">
                                        <i class="fa fa-bold"></i>
                                    </li>
                                    <li class="tool disabled">
                                        <i class="fa fa-italic"></i>
                                    </li>
                                    <li class="tool disabled">
                                        <i class="fa fa-list-ul"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</div>
				</div>
			</fieldset>
		</div>
	</section>
@stop