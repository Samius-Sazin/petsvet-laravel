@extends('main')

@section('title', '| User Profile')

@section('content')
    @php
        $user = auth()->user();

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
        <div class="card border-0 shadow-sm p-4 mb-4 bg-light">
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
                        <p class="mb-0 fs-5"><i class="fa-solid fa-location-dot text-secondary me-2"></i>{{ $location }}
                        </p>
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
        <div class="card shadow-sm border p-4 mb-4">
            <h4 class="fw-bold mb-3 fs-2">About Me</h4>
            <p class="text-muted fs-4">{{ $bio }}</p>
        </div>

        {{-- change role --}}
        <div>
            <x-changeRole :role="$role" />
        </div>

        <!-- Main Profile Contents -->
        <div>
            <x-profilePageMainContents :user="$user" :cards="$cards" :counts="$counts" />
        </div>
    </div>

    <!-- Edit Profile Modal (Separate Form) -->
    <x-editProfileModal />

    <!-- Add Product Modal -->
    <x-addProductModal />

    <!-- Add Article Modal -->
    <x-addArticleModal />

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
