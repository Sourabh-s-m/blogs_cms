<nav class="col-md-2 d-none d-md-block sidebar ps-3 pe-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-house-door-fill me-2"></i> Dashboard
                </a>
            </li>
            @if (Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->path(), 'user') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <i class="bi bi-people-fill me-2"></i> Users
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->path(), 'blog') ? 'active' : '' }}"
                    href="{{ route('blogs.index') }}">
                    <i class="bi bi-journal-text me-2"></i> Blogs
                </a>
            </li>
        </ul>
    </div>
</nav>
