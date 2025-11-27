@extends('main')

@section('title', '| Home')

@section('content')
    @include('components.heroSection')

    @include('components.serviceArea')

    @include('components.trendingItems')

    <x-latestArticles :recentArticles="$recentArticles ?? []" />
    <div class="text-center mt-5">
        <a href="{{ route('articles') }}" class="btn btn-primary">Show more articles</a>
    </div>

    @include('components.reviewsCarosel')

    @include('components.faq')

    {{-- @include('components.forYouItems') --}}
@endsection
