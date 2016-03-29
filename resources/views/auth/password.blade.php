@extends('layouts.public')
@section('title', 'Forgot Password')

@section('content')
    <section class="content-container">
        <div class="site-wrap-small">
            <header class="row">
                <div class="column">
                    <h1 class="heading-page">@yield('title')</h1>
                </div>
            </header>
            <form method="POST" action="/password/email">
                {!! csrf_field() !!}

                @include('elements.session')
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
                        <div class="small-12 medium-5 large-5 columns right">
                            <button type="submit" class="large-12 fill button button-primary">
                                Send
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
@stop