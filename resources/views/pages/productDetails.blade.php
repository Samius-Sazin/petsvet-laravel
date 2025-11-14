@extends('main')

@section('title', '| Product Details')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4">Product Details Page</h1>
    <p class="lead">This is a dummy home page for route checking.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Refresh Page</a>
</div>
@endsection
