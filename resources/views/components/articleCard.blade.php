@props(['article'])

@php
    // Handle both array and object formats
    $isArray = is_array($article);
    $articleId = $isArray ? ($article['id'] ?? null) : ($article->id ?? null);
    $articleImage = $isArray ? ($article['image'] ?? null) : ($article->image ?? null);
    $articleCategory = $isArray ? ($article['category'] ?? '') : ($article->category ?? '');
    $articleTitle = $isArray ? ($article['title'] ?? '') : ($article->title ?? '');
    $articleContent = $isArray ? ($article['content'] ?? '') : ($article->content ?? '');
    $articleCreatedAt = $isArray ? ($article['created_at'] ?? null) : ($article->created_at ?? null);
    $articleUser = $isArray ? ($article['user'] ?? null) : ($article->user ?? null);
    $articleLikesCount = $isArray ? ($article['likes_count'] ?? 0) : ($article->likes_count ?? 0);
    $articleIsLiked = $isArray ? ($article['is_liked'] ?? false) : ($article->is_liked ?? false);
    
    $placeholder = asset('images/placeholder_image.png');
    $image = $articleImage ?? $placeholder;
    
    // Handle date formatting
    if ($articleCreatedAt) {
        if ($isArray && is_string($articleCreatedAt)) {
            $formattedDate = \Carbon\Carbon::parse($articleCreatedAt)->format('d M, Y');
        } else {
            $formattedDate = $articleCreatedAt->format('d M, Y');
        }
    } else {
        $formattedDate = 'Unknown date';
    }
    
    $truncatedContent = Str::limit($articleContent, 120, '...');
    $authorName = $isArray ? ($articleUser['name'] ?? 'Unknown') : ($articleUser->name ?? 'Unknown');
@endphp

    <div class="col-lg-4 col-md-6">
    <div class="card h-100 border-0 article-card shadow-sm" 
         data-article-id="{{ $articleId }}"
         data-article-image="{{ htmlspecialchars($image, ENT_QUOTES, 'UTF-8') }}"
         data-article-category="{{ htmlspecialchars($articleCategory, ENT_QUOTES, 'UTF-8') }}"
         data-article-title="{{ htmlspecialchars($articleTitle, ENT_QUOTES, 'UTF-8') }}"
         data-article-excerpt="{{ htmlspecialchars($truncatedContent, ENT_QUOTES, 'UTF-8') }}"
         data-article-date="{{ htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') }}"
         data-article-content="{{ htmlspecialchars($articleContent, ENT_QUOTES, 'UTF-8') }}"
         data-article-author="{{ htmlspecialchars($authorName, ENT_QUOTES, 'UTF-8') }}"
         data-article-likes-count="{{ $articleLikesCount }}"
         data-article-is-liked="{{ $articleIsLiked ? 'true' : 'false' }}">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $articleTitle }}"
            style="height: 250px; object-fit: cover;">
        <div class="card-body">
            <p class="text-primary small mb-2 fw-semibold">{{ $articleCategory }}</p>
            <h5 class="card-title mb-3 article-title" style="cursor: pointer;">{{ $articleTitle }}</h5>
            <p class="card-text text-muted small mb-3">
                {{ $truncatedContent }}
            </p>
            <p class="text-muted small mb-3">{{ $formattedDate }}</p>
            <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                Read More
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="ms-2">
                    <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    .article-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
