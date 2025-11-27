@props(['user', 'cards', 'counts'])

<div class="row g-4 mb-4">
    @if (!empty($cards))
        @foreach ($cards as $card)
            
            @php
                $link = '#';
                
                
                if ($card['key'] === 'qna') {
                    $link = route('qna.index', ['user_id' => $user->id]);
                } 
                
                elseif ($card['key'] === 'products') {
                    $link = route('products');
                }
                
                elseif (isset($card['route']) && Route::has($card['route'])) {
                    $link = route($card['route']);
                }
            @endphp

            <div class="col-md-12">
                <div class="card shadow-sm border border-{{ $card['color'] }} p-4 stats-vertical h-100">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            {{-- আইকন --}}
                            <i class="{{ $card['icon'] }} fs-2 text-{{ $card['color'] }} me-3"></i>
                            <h5 class="fw-bold mb-0 fs-3">{{ $card['title'] }}</h5>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-hashtag text-muted me-2"></i>
                            <span class="fs-4 fw-bold">{{ $counts[$card['key']] ?? 0 }}</span>
                        </div>
                    </div>

                    <p class="text-muted fs-5 mb-4">{{ $card['description'] }}</p>

                    <div class="mt-auto">
                        
                        {{-- View Button --}}
                        <a href="{{ $link }}" class="btn btn-outline-{{ $card['color'] }} btn-sm px-4 py-2 fs-5 text-decoration-none">
                            <i class="fa-solid fa-arrow-right me-2"></i> View {{ $card['title'] }}
                        </a>

                        {{-- Add Product Button (Only for Admin & Product Card) --}}
                        @if ($user->role === 0 && $card['key'] === 'products')
                            <button type="button" class="ms-3 btn btn-outline-{{ $card['color'] }} btn-sm px-4 py-2 fs-5"
                                data-bs-toggle="modal" data-bs-target="#addProductModal">
                                <i class="fa-solid fa-pen me-1"></i> Add Product
                            </button>
                        @endif

                        <!-- Add article button - Only for veterinarians (role = 2) and admins (role = 0) -->
                        @if (($user->role === 2 || $user->role === 0) && $card['key'] === 'articles')
                            <button type="button" class="ms-4 btn btn-outline-{{ $card['color'] }} btn-sm px-4 py-2 fs-5"
                                data-bs-toggle="modal" data-bs-target="#addArticleModal">
                                <i class="fa-solid fa-pen me-1"></i> Add Article
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="alert alert-info">No dashboard cards configured for your role.</div>
        </div>
    @endif
</div>

<style>
    
    .stats-vertical {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        background-color: #fff; 
    }

    .stats-vertical:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>