@extends('main')

@section('title', '| User Profile')

@section('content')
    @php
        $totalPosts = 12;
        $totalQna = 5;
        $totalPurchases = 3;
    @endphp

    <div class="container my-5">

        <!-- Profile Header -->
        <div class="card border-0 shadow-sm p-4 mb-4">
            <div class="d-flex flex-wrap align-items-center gap-4">

                <!-- Profile Image with Edit Button -->
                <div class="position-relative" style="width: 140px;">
                    <img src="{{ auth()->user()->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                        class="rounded-circle shadow-sm" alt="Profile Image"
                        style="width: 140px; height: 140px; object-fit: cover;">

                    <!-- Edit Button -->
                    <button class="btn btn-primary btn-sm rounded-circle position-absolute" style="bottom: 5px; right: 5px;"
                        onclick="document.getElementById('profilePhotoInput').click()">
                        <i class="fa-solid fa-camera"></i>
                    </button>

                    <form method="POST" enctype="multipart/form-data" class="d-none">
                        @csrf
                        <input type="file" name="photo" id="profilePhotoInput" accept="image/*"
                            onchange="this.form.submit()">
                    </form>
                </div>

                <!-- User Info -->
                <div class="flex-grow-1">
                    <h2 class="fw-bold mb-1">{{ auth()->user()->name }}</h2>
                    <p class="text-muted mb-2">
                        <i class="fa-solid fa-user text-primary"></i> Normal User
                    </p>

                    <!-- Contact Info -->
                    <div class="d-flex flex-wrap gap-3">
                        <p class="mb-0"><i class="fa-solid fa-envelope text-secondary me-2"></i>
                            {{ auth()->user()->email }}</p>
                        <p class="mb-0"><i class="fa-solid fa-phone text-secondary me-2"></i> +880-123-456-789</p>
                        <p class="mb-0"><i class="fa-solid fa-location-dot text-secondary me-2"></i> Dhaka, Bangladesh</p>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-primary me-2"><i class="fa-solid fa-pen me-1"></i> Edit
                            Profile</a>
                        <a href="#" class="btn btn-outline-secondary"><i class="fa-solid fa-key me-1"></i> Change
                            Password</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bio / About Section -->
        <div class="card shadow-sm border-0 p-4 mb-4">
            <h4 class="fw-bold mb-3">About Me</h4>
            <p class="text-muted">Hi! I am {{ auth()->user()->name }}, an active user on our platform. I love contributing
                to posts and QnA. You can contact me anytime via email or social platforms.</p>
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
            <h4 class="fw-bold mb-3">Recent Activity</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-solid fa-pen-to-square text-primary me-2"></i> Posted a new blog on
                    Pet Health</li>
                <li class="list-group-item"><i class="fa-solid fa-circle-question text-success me-2"></i> Asked a question
                    about dog vaccination</li>
                <li class="list-group-item"><i class="fa-solid fa-cart-shopping text-danger me-2"></i> Purchased "Dog Leash"
                </li>
            </ul>
        </div>

    </div>

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
