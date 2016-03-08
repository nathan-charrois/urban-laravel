@extends('layouts.public')
@section('title', 'Create Account')

@section('content')
<section class="content-container">
    <div class="site-wrap-small">
        <header class="row">
            <div class="column">
                <h1 class="heading-page">@yield('title')</h1>
            </div>
        </header>
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            @include('elements.errors')

            <fieldset>
                <div class="row">
                    <div class="column">
                        <div class="input-container">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="input-container">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="input-container">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" name="password_confirmation" value="licoriceJ181990" id="password_confirmation" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 medium-6 large-6 columns right">
                        <button id="submit" class="large-12 fill button button-primary">
                            Register
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
@stop