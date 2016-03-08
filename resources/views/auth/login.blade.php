@extends('layouts.public')
@section('title', 'Login')

@section('content')
    <section class="content-container">
        <div class="site-wrap-small">
            <header class="row">
                <div class="column">
                    <h1 class="heading-page">@yield('title')</h1>
                </div>
            </header>
            <form method="POST" action="/auth/login">
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
                                <input type="password" name="password" id="password" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 medium-7 large-7 columns">
                            <div class="checkbox-container mtm mbl">
                                <input type="hidden" name="remember" data-input="remember_login" value="0" id="remember">
                                <label class="input-checkbox-label">
                                    <span class="input-checkbox" data-input="remember_login"></span>
                                    Remember Me?
                                </label>
                            </div>
                        </div>
                        <div class="small-12 medium-5 large-5 columns">
                            <button id="submit" class="large-12 fill button button-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
@stop