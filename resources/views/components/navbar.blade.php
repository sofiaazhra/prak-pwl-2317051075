<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- Ganti Home jadi Create --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/create') ? 'active' : '' }}" 
                       href="{{ url('/user/create') }}">
                        Create
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user*') && !Request::is('user/create') ? 'active' : '' }}" 
                       href="{{ url('/user') }}">
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" 
                       href="{{ url('/about') }}">
                        About
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>