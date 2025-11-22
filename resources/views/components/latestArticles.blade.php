@php
    $articles = include resource_path('views/data/latestArticles.php');
@endphp

<div class="container my-5">
    <h1 class="text-center fw-bold mb-5 text-dark">
        Latest Articles
    </h1>

    <div class="row g-4 justify-content-center">
        @foreach ($articles as $article)
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                <x-articleCard :article="$article" />
            </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('articles') }}" class="btn btn-primary">Show more articles</a>
    </div>
</div>
