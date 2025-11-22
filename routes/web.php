<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/blogs', function () {
    return view('pages.blogs');
})->name('blogs');

Route::get('/community', function () {
    return view('pages.community');
})->name('community');

Route::get('/products', function () {
    return view('pages.products');
})->name('products');

//Route::get('/product-details', function () {
   // return view('pages.productDetails');
//})->name('product.details');

Route::get('/qna', function () {
    return view('pages.qna');
})->name('qna');

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

Route::get('/consultancy', function () {
    return view('pages.consultancy');
})->name('consultancy');

Route::get('/products/{id}', function ($id) {
    // Load product data from your existing arrays
    $forYou    = include resource_path('views/data/forYouProducts.php');
    $trending  = include resource_path('views/data/trendingProducts.php');

    // Merge both lists into one big collection
    $products = collect($forYou)->merge($trending);

    // Find product by `_id`
    $product = $products->firstWhere('_id', (int) $id);

    if (!$product) {
        abort(404);
    }

    return view('pages.productDetails', [
        'product' => $product,
    ]);
})->name('product.details');