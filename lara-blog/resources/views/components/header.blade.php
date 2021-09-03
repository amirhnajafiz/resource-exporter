<div class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
        <a class="navbar-brand {{ !request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">
            Home
        </a>
        <div class="navbar-nav">
            <a class="nav-item {{ !request()->routeIs('login.page') ? 'active' : '' }}" href="{{ route('login.page') }}">
                Login
            </a>
        </div>
    </nav>
</div>
