<div class="mb-4 rounded d-block">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100" style="position: fixed; top: 0; z-index: 9999;">
        <div class="container">
            <a
                class="navbar-brand {{ request()->routeIs('welcome') ? 'active' : '' }}"
                href="{{ \Illuminate\Support\Facades\Auth::check() ? route('index') : route('welcome') }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                    <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
                </svg>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample07" style="">
                <ul class="navbar-nav mr-auto">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item {{ request()->routeIs('login.page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login.page') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('register.page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register.page') }}">
                            Sign up
                        </a>
                    </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('create.post.page') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('create.post.page') }}">
                                Post
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('view.save') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('view.save') }}">
                                Saved
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('view.draft') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('view.draft', \Illuminate\Support\Facades\Auth::id()) }}">
                                Drafts
                            </a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                            <li class="nav-item {{ request()->routeIs('admin.dash') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.dash') }}">
                                    Admin Panel
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
                <form action="{{ route('search') }}" method="get" class="form-inline my-2 my-md-0">
                    @csrf
                    <button type="submit" class="btn btn-dark text-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input
                        class="form-control ml-2"
                        name="keyword"
                        type="text"
                        placeholder="Tag | Category | Tag ..."
                        aria-label="Search"
                    />
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a class="btn btn-danger rounded-circle ml-2" style="width: 50px; height: 50px;" href="{{ route('logout') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            </svg>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </nav>
</div>
