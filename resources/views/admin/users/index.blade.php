@extends('layouts.admin')
@section('title', 'All Users')

@section('content')
	<section class="content-container">
		<div class="site-wrap">
			<header class="row">
				<div class="small-7 medium-10 large-11 columns">
					<h1 class="heading-page">@yield('title')</h1>
				</div>
				<div class="small-5 medium-2 large-1 columns">
					<a href="/admin/users/create" class="btn-text">Add User</a>
				</div>
			</header>
			<div class="row">
				<div class="large-12 column">
					<h3 class="heading-section">Users</h3>
				</div>
			</div>
			<div class="row">
				@foreach($users as $user)
					<div class="small-6 large-2 columns end">
						<div class="card-container">
							<div class="card">
								<div class="card-photo">
									<div class="card-text-container">
										<a class="link-white link-medium" href="/admin/users/{{ $user->id }}">
											{{ str_limit($user->email, $limit = 8, $end = '...') }}
										</a>
										{{ $user->created_at }}
									</div>
								</div>
								<div class="card-lip clearfix">
									{{ $user->id }}
									<div class="pull-right mlm" title="Account Verified">
										<i class="fa fa-circle fa-{{ $user->verified ? 'verified' : 'not-verified' }}"></i>
									</div>
									<a href="/admin/users/{{ $user->id }}/edit" class="pull-right">
										<i class="fa fa-pencil"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@stop