<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

Route::get('/', function () {
    // Get recent articles (latest 3) for the recent articles section
    $recentArticles = Article::with('user')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    
    $userId = Auth::id();
    
    $recentArticles->each(function ($article) use ($userId) {
        $article->likes_count = $article->getLikesCountAttribute();
        $article->is_liked = $article->isLikedByUser($userId);
    });
    
    return view('pages.home', [
        'recentArticles' => $recentArticles,
    ]);
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/articles', [ArticleController::class, 'getAllArticles'])->name('articles');

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

    // Article like/unlike
    Route::post('/articles/{article}/like', [ArticleController::class, 'toggleLike'])->name('articles.toggleLike');
});

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/profile/products/add', [ProductController::class, 'store'])
        ->name('products.add');
});

// Only veterinarians can create articles
Route::middleware(['auth'])->group(function () {
    Route::post('/profile/articles/add', [ArticleController::class, 'store'])
        ->name('articles.add');
});