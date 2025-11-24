@extends('main')

@section('title', '| User Profile')

@section('content')
    @php
        $user = auth()->user();
        $totalPosts = 12;
        $totalQna = 5;
        $totalPurchases = 3;

        // Default values if something is null
        $name = $user->name ?? 'John Doe';
        $email = $user->email ?? 'user@example.com';
        $location = $user->location ?? 'Not set';
        $bio = $user->bio ?? 'Tell us something about yourself!';
        $role = $user->role ?? 1;
        $type = match ($user->role) {
            0 => 'Admin',
            1 => 'User',
            2 => 'Veterinary',
            default => 'User',
        };
    @endphp

    <script>
        console.log("User Role:", {{ $user->role }});
    </script>

    <div class="container my-5">

        <!-- Profile Header -->
        <div class="card border-0 shadow-sm p-4 mb-4">
            <div class="d-flex flex-wrap align-items-center gap-4">

                <!-- Profile Image -->
                <div style="width: 140px;">
                    <img src="{{ $user->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                        class="rounded-circle shadow-sm" alt="Profile Image"
                        style="width: 140px; height: 140px; object-fit: cover;">
                </div>

                <!-- User Info -->
                <div class="grow">
                    <h2 class="fw-bold mb-1">{{ $name }}</h2>
                    <p class="text-muted mb-2 fs-5">
                        <i class="fa-solid fa-user text-primary"></i> {{ $type }}
                    </p>

                    <!-- Contact Info -->
                    <div class="d-flex flex-wrap gap-3">
                        <p class="mb-0 fs-5"><i class="fa-solid fa-envelope text-secondary me-2"></i> {{ $email }}
                        </p>
                        <p class="mb-0 fs-5"><i class="fa-solid fa-location-dot text-secondary me-2"></i>
                            {{ $location }}</p>
                    </div>

                    <!-- Account Timestamps -->
                    <div class="mt-2">
                        <p class="mb-0 fs-5 text-muted">Joined: {{ $user->created_at->format('F d, Y') }}</p>
                        <p class="mb-0 fs-5 text-muted">Last Updated: {{ $user->updated_at->format('F d, Y h:i A') }}</p>
                    </div>

                    <!-- Edit Profile -->
                    <div class="mt-3">
                        <button class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            <i class="fa-solid fa-pen me-1"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bio / About Section -->
        <div class="card shadow-sm border-0 p-4 mb-4">
            <h4 class="fw-bold mb-3 fs-2">About Me</h4>
            <p class="text-muted fs-4">{{ $bio }}</p>
        </div>

        {{-- change role --}}
        <div>
            <x-changeRole :role="$role" />
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm border p-3 text-center h-100 stats-card">
                        <i class="fa-solid fa-pen-to-square fs-1 text-primary mb-2"></i>
                        <h5 class="fw-bold">Total Posts</h5>
                        <p class="text-muted fs-4">{{ $totalPosts }}</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm border p-3 text-center h-100 stats-card">
                        <i class="fa-solid fa-circle-question fs-1 text-success mb-2"></i>
                        <h5 class="fw-bold">Total QnA</h5>
                        <p class="text-muted fs-4">{{ $totalQna }}</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm border p-3 text-center h-100 stats-card">
                        <i class="fa-solid fa-cart-shopping fs-1 text-danger mb-2"></i>
                        <h5 class="fw-bold">Products Bought</h5>
                        <p class="text-muted fs-4">{{ $totalPurchases }}</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card shadow-sm border-0 p-4 mb-4">
            <h4 class="fw-bold mb-3 fs-2">Recent Activity</h4>
            <ul class="list-group list-group-flush">
                <li class="fs-4 list-group-item"><i class="fa-solid fa-pen-to-square text-primary me-2"></i> Posted a new
                    blog on Pet Health</li>
                <li class="fs-4 list-group-item"><i class="fa-solid fa-circle-question text-success me-2"></i> Asked a
                    question about dog vaccination</li>
                <li class="fs-4 list-group-item"><i class="fa-solid fa-cart-shopping text-danger me-2"></i> Purchased "Dog
                    Leash"</li>
            </ul>
        </div>
    </div>

    <!-- Edit Profile Modal (Separate Form) -->
    @include('profile.editProfileModal')

    <style>
        .stats-card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .stats-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
