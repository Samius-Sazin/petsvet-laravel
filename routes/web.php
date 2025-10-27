<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/community', function () {
    return view('pages.community');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/product-details', function () {
    return view('pages.productDetails');
});

Route::get('/qna', function () {
    return view('pages.qna');
});
