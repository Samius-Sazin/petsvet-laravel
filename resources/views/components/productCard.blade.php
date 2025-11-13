@props(['product'])

@php
    // Fallback image if none provided
    $image = $product['image'] ?? 'https://via.placeholder.com/200x150';

    // Check if offer exists
    $hasOffer = isset($product['offer']) && $product['offer'] > 0;
    $finalPrice = $hasOffer ? $product['price'] - ($product['price'] * $product['offer'] / 100) : $product['price'];
@endphp

<div class="card h-100 shadow-sm border-0">
    <img src="{{ $image }}" class="card-img-top" alt="{{ $product['title'] ?? 'Product' }}">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product['title'] ?? 'Product' }}</h5>

        @if($hasOffer)
            <p class="card-text text-muted mb-2">
                <span class="text-decoration-line-through">${{ $product['price'] }}</span>
                <span class="fw-bold text-danger">${{ $finalPrice }}</span>
            </p>
        @else
            <p class="card-text text-muted mb-2">${{ $product['price'] }}</p>
        @endif

        <a href="#" class="btn btn-primary mt-auto">
            View Product
        </a>
    </div>
</div>
