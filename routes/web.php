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

Route::get('/product-details', function () {
    return view('pages.productDetails');
})->name('product-details');

Route::get('/qna', function () {
    return view('pages.qna');
})->name('qna');

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

Route::get('/consultancy', function () {
    return view('pages.consultancy');
})->name('consultancy');
