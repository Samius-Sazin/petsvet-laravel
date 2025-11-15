@props(['article'])

<div class="card h-100">
    <div class="img-placeholder">
        <img src="{{ $article['image'] ?? 'https://placekitten.com/400/300' }}" class="card-img-top" alt="Pet">
    </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $article['title'] }}</h5>
        <p class="card-text card-desc">{{ $article['desc'] }}</p>
        <p class="card-text"><small class="text-muted">{{ $article['date'] }}</small></p>
        <a href="{{ $article['link'] ?? '#' }}" class="btn btn-primary mt-auto">Read More</a>
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

    .card-desc {
        height: 4.5em; /* Adjust this value to control the number of lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>