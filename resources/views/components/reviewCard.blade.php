@props(['review'])

@php
    $image = $review['image'] ? asset($review['image']) : 'https://via.placeholder.com/100';
    $rating = $review['rating'] ?? 0;
@endphp

<div class="card h-100 shadow border-0 p-3">
    <div class="d-flex align-items-center mb-3">
        {{-- Profile Image --}}
        <div class="img-placeholder me-3">
            <img src="{{ $image }}" class="card-img-top rounded-circle" alt="{{ $review['name'] ?? 'Reviewer' }}">
        </div>

        {{-- Name & Rating --}}
        <div class="flex-grow-1">
            <h5 class="mb-1">{{ $review['name'] ?? 'Anonymous' }}</h5>
            <div>
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $rating)
                        <span class="text-warning">&#9733;</span>
                    @else
                        <span class="text-muted">&#9733;</span>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    {{-- Description --}}
    <p class="card-text">{{ $review['comment'] ?? 'No review provided.' }}</p>
</div>

<style>
    .img-placeholder {
        width: 80px;
        height: 80px;
        background-color: #f0f0f0;
        border-radius: 50%;
        /* Make the placeholder circular */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }


    .img-placeholder .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        transition: transform .2s ease-in-out;
        border: 2px solid #f0f0f0;
    }


    .card:hover .img-placeholder .card-img-top {
        transform: scale(1.05);
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>
