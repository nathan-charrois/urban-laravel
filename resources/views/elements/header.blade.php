<header class="site-header">
    <div class="row-grey">
        <div class="site-wrap">
            <div class="row">
                <div class="small-12 medium-12 large-12 columns">
                    <a href="mailto:nathancharrois@gmail.com" class="link-grey left mtm mbm">Send Feedback</a>
                    <a href="https://github.com/NathanCH/Urban" class="link-grey right mtm mbm">View Source</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row-white">
        <div class="site-wrap">
            <div class="row">
                <div class="small-12 medium-7 large-7 columns">
                    <div class="site-logo-container">
                        <span class="logo-text"><a href="/">Urbn</a></span>
                        <span class="slogan">for architecture and urban enthusiasts.</span>
                    </div>
                </div>
                <div class="small-12 medium-5 large-5 columns">
                    @if ($signedIn)
                    <div class="user-controls right">
                        <div class="display-picture-container">
                            <a href="#">
                                <img src="http://placehold.it/50x50" class="display-picture" />
                            </a>
                        </div>
                        <span class="dropdown">
                            <a class="button button-text button-text-grey" data-event="toggle-dropdown">{{ $currentUser->email }}</a>
                            <ul class="dropdown-menu hide">
                                <li><a href="/users/">Users</a></li>
                                <li><a href="/users/{{ $currentUser->id }}/edit">Edit My Profile</a></li>
                                <li><a href="/regions/create">Create Region</a></li>
                                <li><a href="/users/{{ $currentUser->id }}/changepassword">Change My Password</a></li>
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </span>
                    </div>
                    @else
                    <div class="header-sign-in right">
                        <div class="row">
                            <div class="small-12 medium-12 large-5 columns">
                                <a class="button button-primary" href="/auth/login/">Sign in</a>
                            </div>
                            <div class="small-12 medium-12 large-7 columns">
                                <span class="text">
                                    or <a class="mls" href="/auth/register/">create account</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>