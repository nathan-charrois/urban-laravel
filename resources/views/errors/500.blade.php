@extends('layouts.public')
@section('title', '500')

@section('content')
    <section class="content-container">
        <div class="site-wrap">
            <header class="row">
                <div class="column">
                    <h1 class="heading-page">@yield('title')</h1>
                </div>
            </header>
            <header class="row">
                <div class="column">
                    <p>{{ $message }}</p>
                </div>
            </header>
        </div>
    </section>
@stop