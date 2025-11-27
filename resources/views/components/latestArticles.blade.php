@props(['recentArticles' => []])

@if (!empty($recentArticles) && $recentArticles->count() > 0)
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5 text-dark fs-1">
            Recent Articles
        </h2>

        <div class="row g-4">
            @foreach ($recentArticles as $article)
                <x-articleCard :article="$article" />
            @endforeach
        </div>
    </div>
@endif
