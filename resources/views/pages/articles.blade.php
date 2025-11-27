@extends('main')

@section('title', '| Blogs')

@section('content')


    <div class="container-fluid px-0 mb-5">
        <div class="position-relative">
            <img src="/dummyProducts/hero.jpg" alt="Blogs Banner" class="w-100" style="height: 400px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                style="background-color: rgba(0, 0, 0, 0.6);">
                <h1 class="text-white display-3 fw-bold">Articles</h1>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                <form class="w-100 d-flex align-items-center" method="GET" action="{{ route('articles') }}">
                    <div class="input-group d-none d-md-flex">
                        <span class="input-group-text bg-white btn border"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" value="{{ $searchKeyword ?? '' }}" class="form-control" placeholder="Search articles...">
                    </div>
                    <button class="btn btn-outline-dark d-md-none" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="col-6 col-md-8 d-flex justify-content-end gap-3">
                <!-- Sort Dropdown -->
                <div class="dropdown">
                    <button class="btn border d-flex align-items-center gap-1 dropdown-toggle" type="button"
                        id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-sort"></i>
                    <span class="d-none d-md-inline">Sort By</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item @if (($currentSort ?? 'latest') === 'latest') active @endif"
                                href="{{ route('articles', array_merge(request()->except('page'), ['sort' => 'latest'])) }}">Latest</a></li>
                        <li><a class="dropdown-item @if (($currentSort ?? '') === 'oldest') active @endif"
                                href="{{ route('articles', array_merge(request()->except('page'), ['sort' => 'oldest'])) }}">Oldest</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 80px 0;"></div>

    <div class="container mb-5">
        <div class="row g-4">
            @forelse ($articles ?? [] as $article)
                <x-articleCard :article="$article" />
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted">No articles found</h4>
                    <p class="text-muted">Check back later for new articles!</p>
                </div>
            @endforelse
        </div>
    </div>


    <div class="container text-center mb-5">
        <button class="btn btn-primary btn-lg px-5">View More</button>
    </div>

    <div style="margin: 80px 0;"></div>

    <!-- Recent Articles Section -->
    <x-latestArticles :recentArticles="$recentArticles ?? []" />
@endsection
