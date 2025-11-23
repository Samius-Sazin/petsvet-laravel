<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top px-5">
    <div class="container-fluid">
        <!-- Left: Logo + Site Name -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="/images/logo_black.png" alt="Logo" width="60" height="60" class="me-2">
            <span class="fw-bold">PetsVet</span>
        </a>

        <!-- Middle: Nav links -->
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-3" style="font-size: 1.2rem;">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}"
                        href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('products') ? 'active fw-bold' : '' }}"
                        href="{{ route('products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('articles') ? 'active fw-bold' : '' }}"
                        href="{{ route('articles') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('qna') ? 'active fw-bold' : '' }}"
                        href="{{ route('qna') }}">Q&A</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('community') ? 'active fw-bold' : '' }}"
                        href="{{ route('community') }}">Community</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}"
                        href="{{ route('about') }}">About</a></li>
            </ul>
        </div>


        <!-- Right: Profile or Login -->
        <div class="d-flex align-items-center gap-3">
            @auth
                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="text-dark d-flex align-items-center text-decoration-none dropdown-toggle"
                        id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="gap: 6px;">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile" width="35"
                            height="35" class="rounded-circle">
                    </a>

                    <div class="dropdown-menu dropdown-menu-end shadow rounded-3 p-3" aria-labelledby="profileDropdown"
                        style="min-width: 220px;">
                        <div class="d-grid gap-2 mb-2">
                            <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-user me-2"></i> View Profile
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit me-2"></i> Edit Profile
                            </a>
                            <a href="{{ route('consultancy') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-question-circle me-2"></i> Help
                            </a>
                        </div>

                        <hr class="dropdown-divider my-2">

                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login/Signup Dropdown -->
                <div class="dropdown"></div>
                <a href="#" class="text-dark d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="gap: 6px;">

                    <i class="fa-solid fa-user fs-3 text-dark"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end shadow rounded-3 p-3" aria-labelledby="loginDropdown"
                    style="min-width:220px;">
                    <div class="d-flex flex-column align-items-center mb-2">
                        <div class="me-2">
                            <img src="/images/logo_black.png" alt="logo" width="50" height="50">
                        </div>
                        <div>
                            <div class="fw-bold text-nowrap">Welcome to PetsVet</div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="/login" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </a>
                        <a href="/register" class="btn btn-sm btn-primary">
                            <i class="fas fa-user-plus me-2"></i> Signup
                        </a>
                    </div>

                    <hr class="dropdown-divider my-3">

                    <a class="dropdown-item d-flex align-items-center" 
                    href="{{ route('consultancy') }}">
                        <i class="fas fa-question-circle me-2 text-muted"></i> Help
                    </a>
                </div>
            </div>
        @endauth

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </div>
</nav>
