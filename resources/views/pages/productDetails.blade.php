@extends('main')

@section('title', '| ' . ($product['title'] ?? 'Product Details'))

@section('content')

    @php
        $placeholder = asset(config('constants.placeholder_image'));
        $image = $product['images'][0]['url'] ?? $placeholder;
        $images = $product['images'] ?? [];
        $finalPrice =
            isset($product['offer']) && $product['offer']
                ? $product['price'] - $product['price'] * ($product['offer'] / 100)
                : $product['price'];

        $tags = is_array($product['tags']) ? $product['tags'] : json_decode($product['tags'], true);
        $reviews = is_array($product['reviews']) ? $product['reviews'] : json_decode($product['reviews'], true);
        $ratingCount = $reviews ? count($reviews) : 0;
        $attributes = is_array($product['attributes'])
            ? $product['attributes']
            : json_decode($product['attributes'], true);
    @endphp

    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-muted">Products</a></li>
                <li class="breadcrumb-item active">{{ $product['title'] }}</li>
            </ol>
        </nav>

        {{-- Product Card --}}
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <div class="row g-4">

                {{-- Left Images --}}
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-3 product-thumbs d-flex flex-column gap-2">
                            @foreach ($images as $index => $img)
                                <img src="{{ $img['url'] ?? $placeholder }}" alt="{{ $product['title'] }}"
                                    class="img-fluid {{ $index === 0 ? 'active-thumb' : '' }}">
                            @endforeach
                        </div>
                        <div class="col-9 border">
                            <img id="product-main-image" src="{{ $image }}" class="img-fluid product-main-image">
                        </div>
                    </div>
                </div>

                {{-- Right Content --}}
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-2">{{ $product['title'] }}</h2>
                    <small class="text-muted d-block mb-1">SKU: {{ $product['sku'] ?? 'N/A' }}</small>

                    {{-- Rating --}}
                    <div class="text-warning mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa{{ ($product['rating'] ?? 0) >= $i ? 's' : 'r' }} fa-star"></i>
                        @endfor
                        <small class="text-muted">({{ $ratingCount }} reviews)</small>
                    </div>

                    {{-- Price Section --}}
                    @if (isset($product['offer']) && $product['offer'] > 0)
                        <h4 class="text-danger fw-bold">
                            ${{ number_format($finalPrice, 2) }}
                            <small class="text-muted text-decoration-line-through">
                                ${{ number_format($product['price'], 2) }}
                            </small>
                            <span class="badge bg-success ms-2">{{ $product['offer'] }}% OFF</span>
                        </h4>
                    @else
                        <h4 class="text-primary fw-bold">${{ number_format($product['price'], 2) }}</h4>
                    @endif

                    <p class="text-muted mt-2">{{ $product['details'] ?? '' }}</p>

                    {{-- Meta Info --}}
                    <ul class="list-unstyled small">
                        <li><strong>Category:</strong> {{ $product['category'] ?? '' }}</li>
                        <li><strong>Available:</strong> {{ $product['quantity'] ?? 0 }}</li>
                        <li><strong>Sold:</strong> {{ $product['sold'] ?? 0 }}</li>
                    </ul>

                    @if (!empty($product['is_featured']))
                        <span class="badge bg-warning text-dark">Featured Product</span>
                    @endif

                    {{-- Quantity Select --}}
                    <div class="d-flex align-items-center my-3">
                        <strong class="me-2">Quantity:</strong>
                        <div class="d-flex align-items-center border rounded-pill px-2 py-1">
                            <button class="btn btn-sm btn-primary rounded-circle" data-qty-minus>-</button>
                            <span class="mx-3 fw-semibold" data-qty-value>1</span>
                            <button class="btn btn-sm btn-primary rounded-circle" data-qty-plus>+</button>
                        </div>
                    </div>

                    {{-- Tags --}}
                    @if ($tags)
                        <div class="mb-3">
                            @foreach ($tags as $tag)
                                <span class="badge bg-light text-dark border me-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <button class="btn btn-primary rounded-pill px-4">Add to Cart</button>
                </div>
            </div>
        </div>

        {{-- Attributes Section --}}
        @if ($attributes && count($attributes) > 0)
            <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                <h5 class="fw-bold mb-3">Product Attributes</h5>
                <table class="table table-sm">
                    @foreach ($attributes as $key => $value)
                        <tr>
                            <th>{{ $key }}</th>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif

        {{-- Description & Reviews Tabs --}}
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
            <ul class="nav nav-pills mb-3" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="pill"
                        data-bs-target="#description-pane" type="button" role="tab">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="pill" data-bs-target="#reviews-pane"
                        type="button" role="tab">Reviews ({{ $ratingCount ?? 0 }})</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabContent">
                {{-- Description Tab --}}
                <div class="tab-pane fade show active" id="description-pane" role="tabpanel">
                    <p class="fs-5 fw-medium">{{ $product['details'] ?? 'No details available.' }}</p>
                </div>

                {{-- Reviews Tab --}}
                <div class="tab-pane fade" id="reviews-pane" role="tabpanel">
                    @if ($reviews && count($reviews) > 0)
                        @foreach ($reviews as $review)
                            <div class="border-bottom pb-2 mb-2">
                                <strong>{{ $review['user'] ?? 'Anonymous' }}</strong>
                                <div class="text-warning small">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa{{ ($review['rating'] ?? 0) >= $i ? 's' : 'r' }} fa-star"></i>
                                    @endfor
                                </div>
                                <p class="small text-muted">{{ $review['comment'] ?? '' }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="fs-5 fw-medium">No reviews yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-main-image {
            border-radius: 16px;
        }

        .product-thumbs img {
            border-radius: 12px;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .product-thumbs img.active-thumb {
            border-color: #0d6efd;
        }
    </style>

    <script>
        // Thumbnail switch
        document.querySelectorAll('.product-thumbs img').forEach(img => {
            img.onclick = function() {
                document.querySelector('#product-main-image').src = this.src;
                document.querySelectorAll('.product-thumbs img').forEach(i => i.classList.remove(
                    'active-thumb'));
                this.classList.add('active-thumb');
            }
        });

        // Quantity control
        let value = 1;
        const valueEl = document.querySelector('[data-qty-value]');

        document.querySelector('[data-qty-plus]').onclick = () => {
            value++;
            valueEl.textContent = value;
        }

        document.querySelector('[data-qty-minus]').onclick = () => {
            if (value > 1) value--;
            valueEl.textContent = value;
        }
    </script>

@endsection
