@php
    $productPageBanner = asset('images/about-cat-1.png');
@endphp

@extends('main')
@section('title', '| Products')

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
                <form class="w-100 d-flex align-items-center">
                    <div class="input-group d-none d-md-flex">
                        <span class="input-group-text bg-white btn border"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search products...">
                    </div>
                    <button class="btn btn-outline-dark d-md-none">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Sort + Category (Right Side) -->
            <div class="col-6 col-md-8 d-flex justify-content-end gap-3">
                <div class="d-flex align-items-center gap-1 btn border">
                    <i class="fas fa-sort"></i>
                    <span class="d-none d-md-inline">Sort By</span>
                </div>
                <div class="d-flex align-items-center gap-1 btn border">
                    <i class="fas fa-filter"></i>
                    <span class="d-none d-md-inline">Category</span>
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
            <button class="btn btn-primary px-4 py-2">Explore More</button>
        </div>
    </div>

    <div style="margin: 100px 0;"></div>

    {{-- @include('components.trendingItems') --}}

    <div style="margin: 100px 0;"></div>

    @include('components.reviewsCarosel')

@endsection
