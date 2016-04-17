@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')
    <section class="content-container">
        <div class="site-wrap">
            <header class="row">
                <div class="column">
                    <h1 class="heading-page">@yield('title')</h1>
                </div>
            </header>
            <form action="/admin/users/{{ $user->id }}" method="POST">
                @include('elements.errors')
                
                {!! csrf_field() !!}
                {{ method_field('PUT') }}

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
                                <input type="text" name="city" id="city" value="{{ $user->profile->city }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <h3 class="heading-section">Details</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <div class="small-12 medium-4 large-3 columns">
                                <label for="name">Name:</label>
                            </div>
                            <div class="small-12 medium-8 large-6 columns end">
                                <input type="text" name="name" id="name" value="{{ $user->profile->name }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <div class="small-12 medium-4 large-3 columns">
                                <label for="email">Email:</label>
                            </div>
                            <div class="small-12 medium-8 large-6 columns end">
                                <input type="text" name="email" id="email" value="{{ $user->email }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <div class="small-12 medium-4 large-3 columns">
                                <label for="password_placeholder">Password:</label>
                            </div>
                            <div class="small-12 medium-8 large-6 columns end">
                                <input type="password" name="password_placeholder" id="password_placeholder" value="placeholder" disabled />
                                <div class="row">
                                    <div class="small-12 medium-12 large-12 columns">
                                        <a class="mtl" href="/admin/users/{{ $user->id }}/changepassword">Change Password</a>
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
                        <div class="large-12 columns">
                            <h3 class="heading-section">About</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="textarea-editor">
                                <textarea rows="5" name="about" class="textarea-editor-body">{{ $user->profile->about}}</textarea>
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
                    <div class="row">
                        <div class="small-12 medium-4 large-2 right columns">
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