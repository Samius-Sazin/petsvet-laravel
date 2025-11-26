@php
    use App\Http\Controllers\ProductController;

    $placeholder = config('constants.placeholder_image');

    // Fetch trending products
    $trendingProducts = ProductController::getTrendingProducts();

    // Add placeholder for missing images
    foreach ($trendingProducts as &$product) {
        $product['image'] = isset($product['images'][0]['url']) ? $product['images'][0]['url'] : $placeholder;
    }

    // Helper: chunk products for carousel slides
    function chunkProducts($products, $perSlide)
    {
        return array_chunk($products, $perSlide);
    }
@endphp

<div class="container my-5">
    <h1 class="text-center fw-bold mb-5 text-dark">Trending Items</h1>

    @if (count($trendingProducts) > 0)
        <div id="trendingCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @php
                    $slides = chunkProducts($trendingProducts, min(4, count($trendingProducts)));
                @endphp


                @foreach ($slides as $chunkIndex => $productChunk)
                    <div class="carousel-item @if ($chunkIndex === 0) active @endif">
                        <div class="row g-4 justify-content-center">
                            @foreach ($productChunk as $product)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <x-productCard :product="$product" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Carousel buttons --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#trendingCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn-custom" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#trendingCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon btn-custom" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif
</div>

<style>
    .carousel-control-prev,
    .carousel-control-next {
        width: 80px;
        height: 80px;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 100% 100%;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.6);
    }

    @media (max-width: 768px) {

        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselElement = document.querySelector('#trendingCarousel');
        if (carouselElement) {
            new bootstrap.Carousel(carouselElement, {
                interval: 3000,
                ride: 'carousel',
                pause: 'hover',
            });
        }
    });
</script>
