@props(['product'])

@php
    $image = isset($product['images'][0]) ? asset($product['images'][0]) : 'https://via.placeholder.com/200x150';

    $hasOffer = isset($product['offer']) && $product['offer'] > 0;
    $finalPrice = $hasOffer ? $product['price'] - ($product['price'] * $product['offer']) / 100 : $product['price'];
@endphp

<div class="card h-100 shadow-sm border-0">
    <div class="img-placeholder">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $product['title'] ?? 'Product' }}">
    </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product['title'] ?? 'Product' }}</h5>

        @if ($hasOffer)
            <p class="card-text text-muted mb-2">
                <span class="text-decoration-line-through">${{ $product['price'] }}</span>
                <span class="fw-bold text-danger">${{ $finalPrice }}</span>
            </p>
        @else
            <p class="card-text text-muted mb-2">${{ $product['price'] }}</p>
        @endif

        <a href="{{ route('product.details', $product['_id']) }}" class="btn btn-primary mt-auto">
            View Product
        </a>
    </div>
</div>

<style>
    .img-placeholder {
        width: 100%;
        height: 220px;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .img-placeholder .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .2s ease-in-out;
    }

    .card:hover .img-placeholder .card-img-top {
        transform: scale(1.08);
    }
</style>
