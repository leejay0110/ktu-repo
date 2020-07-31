<nav class="navbar navbar-expand-lg bg-dark-blue navbar-dark px-4 py-3">

    <div class="container p-0">

        <a href="{{ route('homepage') }}" class="navbar-brand mb-0 h1">{{ env('APP_NAME') }}</a>

        <button class="navbar-toggler btn btn-dark-blue border-0" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link {{ Route::is('papers.index') ? 'active' : '' }}" href="{{ route('papers.index') }}">Past Examination Papers</a>
                <a class="nav-item nav-link {{ Route::is('materials.*') ? 'active' : '' }}" href="{{ route('materials.index') }}">Course Materials</a>
                <a class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            </div>
            

            @auth
            
                @if (Auth::user()->isAdmin())
                    
                    @if ( Auth::user()->unreadNotifications->count() )
                        
                        <div class="dropdown">
    
                            <button class="btn text-white dropdown-toggle" type="button" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge badge-pill badge-light">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                            </button>
    
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right" aria-labelledby="notificationsDropdown">
    
    
                                @foreach (Auth::user()->unreadNotifications as $notification)
    
                                    <a class="dropdown-item text-primary" href="{{ route('notifications.show', $notification) }}">
                                        New user registed {{ $notification->created_at->diffForHumans() }}
                                    </a>
    
                                @endforeach

                                <div class="dropdown-divider"></div>

                                <a href="{{ route('notifications.index') }}" class="dropdown-item">View Notifications</a>
    
    
                            </div>
    
                        </div>

                    @endif

                @endif


                <div class="dropdown">

                    <button class="btn btn-blue dropdown-toggle" type="button" id="appDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                        {{ Auth::user()->username }}
                    </button>

                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right" aria-labelledby="appDropdown">

                        @if (Auth::user()->isAdmin())
                            <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                        @else
                            <a class="dropdown-item" href="{{ route('user.index') }}">Dashboard</a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                            @csrf
                        </form>

                    </div>

                </div>
            
            @endauth

        
            @guest
                <a href="{{ route('login.show') }}" class="btn btn-blue">
                    Sign in <i class="fas fa-sign-in-alt"></i>
                </a>
            @endguest

        </div>

    </div>

</nav>
