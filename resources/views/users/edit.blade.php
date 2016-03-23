@extends('layouts.public')
@section('title', 'Edit User')

@section('content')
	<section class="content-container">
		<div class="site-wrap">
			<header class="row">
				<div class="column">
					<h1 class="heading-page">@yield('title')</h1>
				</div>
			</header>
			<form action="/users/{{ $user->id }}" method="POST">
				@include('elements.errors')
				
				{!! csrf_field() !!}
				{{ method_field('PUT') }}

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
	                            <input type="text" name="email" id="email" value="{{ $user->email }}" />
	                            <div class="row">
	                                <div class="small-12 medium-12 large-12 columns">
	                                    <a class="mtl" href="/users/{{ $user->id }}/changepassword">Change Password</a>
	                                </div>
	                            </div>
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
									<input type="hidden" name="deleted" data-input="deleted" value="{{ $user->deleted }}"/>
									<label class="input-checkbox-label">
										<span class="input-checkbox" data-input="deleted"></span>
										Deleted
									</label>
								</div>
                                <div class="checkbox-container mtl">
                                    <input type="hidden" name="verified" data-input="verified" value="{{ $user->verified }}"/>
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