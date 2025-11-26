@extends('main')
@section('title', '| Products')

@php
    $categories = [
        'food' => 'Food',
        'grooming' => 'Grooming',
        'house' => 'House',
        'bag' => 'Travel Bag',
    ];

    $selectedCategory = $categories[$currentCategory ?? ''] ?? 'Category';
@endphp

@section('content')
    <!-- Banner Section -->
    <section class="w-100 position-relative"
        style="height: 320px; background: url('{{ $productPageBanner }}') center/cover no-repeat;">
        <div class="w-100 h-100 position-absolute top-0 start-0" style="background: rgba(0,0,0,0.55);"></div>
        <div
            class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100 text-center px-3">
            <h2 class="fw-bold">Big Winter Sale is Live!</h2>
            <p class="mb-0">Up to 40% OFF on selected items. Hurry before stock runs out!</p>
        </div>
    </section>

    <!-- Filter & Search Row -->
    <div class="container my-4">
        <div class="row align-items-center">
            <!-- Search bar -->
            <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                <form class="w-100 d-flex align-items-center" method="GET" action="{{ route('products') }}">
                    <div class="input-group d-none d-md-flex">
                        <span class="input-group-text bg-white btn border">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="search" value="{{ $searchKeyword ?? '' }}" class="form-control"
                            placeholder="Search products...">
                    </div>
                    <button class="btn btn-outline-dark d-md-none" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Sort + Category (Right Side) -->
            <div class="col-6 col-md-8 d-flex justify-content-end gap-3">

                <!-- Sort Dropdown -->
                <div class="dropdown">
                    <button class="btn border d-flex align-items-center gap-1 dropdown-toggle" type="button"
                        id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sort"></i>
                        <span class="d-none d-md-inline">Sort By</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="{{ route('products', ['sort' => 'price_asc']) }}">Price: Low to
                                High</a></li>
                        <li><a class="dropdown-item" href="{{ route('products', ['sort' => 'price_desc']) }}">Price: High to
                                Low</a></li>
                        <li><a class="dropdown-item" href="{{ route('products', ['sort' => 'latest']) }}">Latest</a></li>
                        <li><a class="dropdown-item" href="{{ route('products', ['sort' => 'popular']) }}">Most Popular</a>
                        <li><a class="dropdown-item" href="{{ route('products') }}">Default</a></li>
                    </ul>
                </div>

                <!-- Category Dropdown -->
                <div class="dropdown">
                    <button class="btn border d-flex align-items-center gap-1 dropdown-toggle" type="button"
                        id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-filter"></i>
                        <span class="d-none d-md-inline">{{ $selectedCategory }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        @foreach ($categories as $key => $label)
                            <li>
                                <a class="dropdown-item @if (($currentCategory ?? '') === $key) active @endif"
                                    href="{{ route('products', array_merge(request()->except('page'), ['category' => $key])) }}">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div style="margin: 100px 0;"></div>

    <!-- Products Grid -->
    <div class="container">
        <div class="row gy-5 gx-3">
            @foreach ($products as $product)
                <div class="col-6 col-lg-3">
                    <x-productCard :product="$product" />
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary px-4 py-2" onclick="window.location.reload()">Explore More</button>
        </div>

    </div>

    <div style="margin: 100px 0;"></div>

    @include('components.trendingItems')

    <div style="margin: 100px 0;"></div>

    @include('components.reviewsCarosel')

@endsection
