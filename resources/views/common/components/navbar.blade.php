<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container-fluid">
        <!-- Left: Logo + Site Name -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="/images/logo_black.png" alt="Logo" width="60" height="60" class="me-2">
            <span class="fw-bold">PetsVet</span>
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Middle: Nav links -->
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-3" style="font-size: 1.2rem;">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}"
                        href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('products') ? 'active fw-bold' : '' }}"
                        href="{{ route('products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog') ? 'active fw-bold' : '' }}"
                        href="{{ route('blogs') }}">Blogs</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('qna') ? 'active fw-bold' : '' }}"
                        href="{{ route('qna') }}">Q&A</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('community') ? 'active fw-bold' : '' }}"
                        href="{{ route('community') }}">Community</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}"
                        href="{{ route('about') }}">About</a></li>
            </ul>
        </div>


        <!-- Right: Profile or Login -->
        <div class="d-flex align-items-center">
            @auth
                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                        id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile" width="35"
                            height="35" class="rounded-circle me-1">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Right: Profile Icon -->
                <div class="navbar-right">
                    <i class="fas fa-user-circle profile-icon fa-2xl"></i>
                </div>

            @endauth
        </div>
    </div>
</nav>
