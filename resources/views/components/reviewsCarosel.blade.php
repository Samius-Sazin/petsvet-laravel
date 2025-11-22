@php
    $reviews = include resource_path('views/data/reviews.php');
    $fetchFailed = false;
@endphp

<div class="container my-5">
    <h1 class="text-center fw-bold mb-5 text-dark">
        Reviews
    </h1>

    @if (count($reviews) > 0)
        <div class="row g-4 justify-content-center">
            @foreach ($reviews as $review)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-reviewCard :review="$review" />
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center">
            @if ($fetchFailed)
                <span class="text-muted small">Can't load reviews</span>
            @else
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            @endif
        </div>
    @endif
</div>
