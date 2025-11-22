@extends('main')

@section('title', '| ' . ($product['title'] ?? 'Product Details'))

@section('content')
<style>
    .product-page {
        padding-top: 40px;
        padding-bottom: 60px;
    }

    .breadcrumb {
        font-size: 0.9rem;
        background-color: transparent;
        padding-left: 0;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #6c757d;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }

    .product-main-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        padding: 24px;
        background-color: #ffffff;
        margin-bottom: 40px;
    }

    .product-thumbs img {
        border-radius: 12px;
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s;
        border: 2px solid transparent;
    }

    .product-thumbs img:hover,
    .product-thumbs img.active-thumb {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        border-color: #0d6efd;
    }

    .product-main-image {
        border-radius: 18px;
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .product-title {
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 8px;
    }

    .product-price {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .product-short {
        font-size: 0.95rem;
        color: #6c757d;
        max-width: 380px;
    }

    .product-stock {
        font-weight: 600;
    }

.quantity-control {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    background-color: #f5f7fb; /* light pill background */
    padding: 4px 12px;
    gap: 10px;
}

    .quantity-btn {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: none;
    background-color: #0d6efd;      /* solid blue circle */
    color: #ffffff;                 /* white + / - icon */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    }

    .quantity-btn:disabled {
        opacity: 0.5;
        cursor: default;
    }

    .quantity-value {
        min-width: 20px;
        text-align: center;
        font-weight: 600;
    }

    .product-action-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 1px solid #e0e4f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 8px;
        color: #0d6efd;
        background-color: #ffffff;
    }

    .product-action-icon:hover {
        background-color: #0d6efd;
        color: #ffffff;
    }

    .btn-add-cart {
        border-radius: 999px;
        padding: 12px 34px;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .product-tabs .nav-link {
        border-radius: 999px;
        padding: 8px 18px;
        font-size: 0.9rem;
        color: #0d6efd;
    }

    .product-tabs .nav-link.active {
        background-color: #0d6efd;
        color: #ffffff;
    }

    .product-overview p,
    .product-overview li {
        font-size: 0.95rem;
        color: #4b5563;
    }

    .best-selling-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .product-card-mini {
        border-radius: 14px;
        border: none;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        overflow: hidden;
        height: 100%;
    }

    .product-card-mini img {
        width: 100%;
        height: 190px;
        object-fit: cover;
    }

    .rating-stars {
        color: #ffc107;
        font-size: 0.85rem;
    }

    @media (max-width: 991.98px) {
        .product-main-card {
            padding: 16px;
        }
        .product-title {
            font-size: 1.5rem;
        }
    }
</style>

@php
    // Map product array from data file
    $productName   = $product['title']  ?? 'Product';
    $productPrice  = $product['price']  ?? 0;
    $productRating = $product['rating'] ?? 4.5;
    $ratingCount   = isset($product['reviews']) ? count($product['reviews']) : 0;
    if ($ratingCount === 0) {
        $ratingCount = 435; // fallback
    }
    $shortDesc     = $product['details'] ?? 'No details available yet.';
    $images        = $product['images']  ?? [];
    if (empty($images)) {
        $images = ['https://via.placeholder.com/800x600'];
    }
@endphp

<div class="container product-page">

    {{-- BREADCRUMB --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $productName }}
            </li>
        </ol>
    </nav>

    {{-- MAIN PRODUCT SECTION --}}
    <div class="product-main-card">
        <div class="row g-4 align-items-start">

            {{-- LEFT: thumbnails + main image --}}
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-2 col-md-3 product-thumbs d-flex flex-column gap-2">
                        @foreach($images as $index => $img)
                            <img src="{{ asset($img) }}"
                                 alt="Thumbnail {{ $index + 1 }}"
                                 class="img-fluid {{ $index === 0 ? 'active-thumb' : '' }}"
                                 data-main-target="#product-main-image">
                        @endforeach
                    </div>
                    <div class="col-10 col-md-9">
                        <img id="product-main-image"
                             src="{{ asset($images[0]) }}"
                             class="product-main-image"
                             alt="{{ $productName }}">
                    </div>
                </div>
            </div>

            {{-- RIGHT: info --}}
            <div class="col-lg-6">
                <h1 class="product-title">{{ $productName }}</h1>

                <div class="d-flex align-items-center mb-2">
                    <div class="rating-stars me-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($productRating >= $i)
                                <i class="fa-solid fa-star"></i>
                            @elseif($productRating >= $i - 0.5)
                                <i class="fa-solid fa-star-half-stroke"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="text-muted small">({{ $ratingCount }})</span>
                </div>

                <div class="product-price mb-2">
                    ${{ number_format($productPrice, 2) }}
                </div>

                <p class="product-short mb-2">
                    {{ $shortDesc }}
                </p>

                <p class="mb-3">
                    <span class="text-success product-stock">In Stock</span>
                </p>

                {{-- Quantity + Add to cart --}}
                <div class="mb-3">
                    <span class="me-3 fw-semibold">Quantity:</span>
                    <div class="quantity-control" data-qty-container>
                        <button type="button" class="quantity-btn" data-qty-minus>-</button>
                        <span class="quantity-value" data-qty-value>1</span>
                        <button type="button" class="quantity-btn" data-qty-plus>+</button>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                    <div>
                        <button type="button" class="product-action-icon" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <button type="button" class="product-action-icon" title="Share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-primary btn-add-cart ms-lg-3 mt-2 mt-lg-0">
                        Add to Cart
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- DESCRIPTION / REVIEWS TABS --}}
<div class="mb-4">
    <ul class="nav nav-pills product-tabs mb-3" id="product-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active"
                    id="description-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#description-pane"
                    type="button"
                    role="tab">
                Description
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    id="reviews-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#reviews-pane"
                    type="button"
                    role="tab">
                Reviews
            </button>
        </li>
    </ul>

    <div class="tab-content">

        {{-- Description Tab --}}
        <div class="tab-pane fade show active" id="description-pane" role="tabpanel">
            <div class="product-overview">
                <h4 class="mb-3">Product Overview</h4>

                <p>{{ $shortDesc }}</p>
                <p>{{ $shortDesc }}</p>

                <ol class="mt-3 mb-3">
                    <li>{{ $shortDesc }}</li>
                    <li>{{ $shortDesc }}</li>
                    <li>{{ $shortDesc }}</li>
                </ol>

                <p>{{ $shortDesc }}</p>
            </div>
        </div>

        {{-- Reviews Tab --}}
        <div class="tab-pane fade" id="reviews-pane" role="tabpanel">
            <p class="text-muted">
                No reviews yet. (Later you can pull from DB)
            </p>
        </div>

    </div>
</div>


<script>
    // Thumbnail → main image swap
    document.querySelectorAll('.product-thumbs img').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            const targetSelector = this.getAttribute('data-main-target');
            const mainImg = document.querySelector(targetSelector);
            if (!mainImg) return;

            mainImg.src = this.src;

            document.querySelectorAll('.product-thumbs img').forEach(function (img) {
                img.classList.remove('active-thumb');
            });
            this.classList.add('active-thumb');
        });
    });

    // Quantity control
    document.querySelectorAll('[data-qty-container]').forEach(function (container) {
        const minusBtn = container.querySelector('[data-qty-minus]');
        const plusBtn  = container.querySelector('[data-qty-plus]');
        const valueEl  = container.querySelector('[data-qty-value]');
        let value = parseInt(valueEl.textContent || '1', 10);

        function updateButtons() {
            if (value <= 1) {
                value = 1;
                minusBtn.setAttribute('disabled', 'disabled');
            } else {
                minusBtn.removeAttribute('disabled');
            }
        }

        minusBtn.addEventListener('click', function () {
            value--;
            if (value < 1) value = 1;
            valueEl.textContent = value;
            updateButtons();
        });

        plusBtn.addEventListener('click', function () {
            value++;
            valueEl.textContent = value;
            updateButtons();
        });

        updateButtons();
    });
</script>
@endsection
