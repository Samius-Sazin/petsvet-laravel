@props(['user', 'cards', 'counts'])

<div class="row g-4 mb-4">
    @if (!empty($cards))
        @foreach ($cards as $card)
            <div class="col-md-12">
                <div class="card shadow-sm border border-{{ $card['color'] }} p-4 stats-vertical">

                    <!-- Header: Icon + Title -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <i class="{{ $card['icon'] }} fs-2 text-{{ $card['color'] }} me-3"></i>
                            <h5 class="fw-bold mb-0 fs-3">{{ $card['title'] }}</h5>
                        </div>

                        <!-- Count with icon -->
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-hashtag text-muted me-2"></i>
                            <span class="fs-4 fw-bold">{{ $counts[$card['key']] ?? 0 }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-muted fs-5">{{ $card['description'] }}</p>

                    <!-- Button -->
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-{{ $card['color'] }} btn-sm px-4 py-2 fs-5">
                            <i class="fa-solid fa-arrow-right me-2"></i>
                            View {{ $card['title'] }}
                        </a>

                        <!-- Add product button -->
                        @if ($user->role === 0 && $card['key'] === 'products')
                            <button type="button" class="ms-4 btn btn-outline-{{ $card['color'] }} btn-sm px-4 py-2 fs-5"
                                data-bs-toggle="modal" data-bs-target="#addProductModal">
                                <i class="fa-solid fa-pen me-1"></i> Add Product
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <p class="text-muted">No dashboard cards configured for your role.</p>
    @endif
</div>

<style>
    .stats-vertical {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .stats-vertical:hover {
        transform: translateY(-3px) scale(1.01);
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
    }
</style>
