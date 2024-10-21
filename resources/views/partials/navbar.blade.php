<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Blog Management
        </a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="bi bi-person-circle me-2"></i> {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item border-bottom " href="{{ route('profile') }}"><i
                                    class="bi bi-person"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="d-block d-md-none nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }} dropdown-item border-bottom d-block d-md-block"
                            href="{{ route('home') }}">
                            <i class="bi bi-house-door-fill me-2"></i> Dashboard
                        </a>
                    </li>
                    @if (Auth::user()->role === 'admin')
                        <li class="d-block d-md-none nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }} dropdown-item border-bottom d-block d-md-block"
                                href="{{ route('users.index') }}">
                                <i class="bi bi-people-fill me-2"></i> Users
                            </a>

                        </li>
                        <li class="d-block d-md-none nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }} dropdown-item border-bottom"
                                href="{{ route('blogs.index') }}">
                                <i class="bi bi-journal-text me-2"></i> Blogs
                            </a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
