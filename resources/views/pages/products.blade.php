@php
    $totalProducts = 42;
@endphp

@extends('main')

@section('title', '| Products')

@section('content')
    <div class="container text-center my-5">
        <h1 class="display-4">Products Page</h1>
        <p class="lead">Total Products: {{ $totalProducts }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Refresh Page</a>
    </div>
@endsection
