@extends('layouts.public')
@section('title', 'Show User')

@section('content')
	<section class="content-container">
		<div class="site-wrap">
			<header class="row">
				<div class="small-7 medium-10 large-11 columns">
					<h1 class="heading-page">@yield('title')</h1>
				</div>
				<div class="small-5 medium-2 large-1 columns">
					<a href="/users/{{ $user->id }}/edit" class="btn-text">Edit User</a>
				</div>
			</header>
			<fieldset>
				<div class="row">
					<div class="large-12 columns">
						<h3 class="heading-section">Details</h3>
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
								<input type="hidden" name="deleted" data-input="deleted" value="{{ $user->deleted }}" disabled/>
								<label class="input-checkbox-label">
									<span class="input-checkbox" data-input="deleted"></span>
									Deleted
								</label>
							</div>
							<div class="checkbox-container mtl">
								<input type="hidden" name="verified" data-input="verified" value="{{ $user->verified }}" disabled/>
								<label class="input-checkbox-label">
									<span class="input-checkbox" data-input="verified"></span>
									Verified
								</label>
							</div>						
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</section>
@stop