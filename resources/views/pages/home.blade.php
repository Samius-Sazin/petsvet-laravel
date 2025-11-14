@extends('main')

@section('title', '| Home')

@section('content')
    @include('components.heroSection')

    @include('components.serviceArea')

    @include('components.trendingItems')

    @include('components.forYouItems')

    @include('components.faq')
@endsection
