<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/articles', function () {
    return view('pages.articles');
})->name('articles');

Route::get('/community', function () {
    return view('pages.community');
})->name('community');


Route::get('/qna', function () {
    return view('pages.qna');
})->name('qna');

Route::get('/consultancy', function () {
    return view('pages.consultancy');
})->name('consultancy');

// products
Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');

// Product details
Route::get('/product/{id}', [ProductController::class, 'getProductById'])->name('product.details');

Route::get('/privacy-and-policy', function () {
    return view('pages.privacyAndPolicy');
})->name('privacy.policy');

Route::post('/auth/firebase-login', [FirebaseController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function () {

    // Show profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // Update profile
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

    // update role
    Route::put('/profile/update-role', [UserController::class, 'updateRole'])
        ->middleware('can:isAdmin')->name('profile.updateRole');// only admin
});

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/profile/products/add', [ProductController::class, 'store'])
        ->name('products.add');
});