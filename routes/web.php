<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Http\Controllers\QnaController;

// --- Public Routes ---

Route::get('/', function () {
    // Get recent articles (latest 3)
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
// Register Route Redirect
Route::get('/register', function () {
    return redirect()->route('home');
    })->name('register');

// Login Route Redirect
Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/articles', [ArticleController::class, 'getAllArticles'])->name('articles');

Route::get('/community', function () {
    return view('pages.community');
})->name('community');

Route::get('/consultancy', function () {
    return view('pages.consultancy');
})->name('consultancy');

Route::get('/privacy-and-policy', function () {
    return view('pages.privacyAndPolicy');
})->name('privacy.policy');

// Product Routes
Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'getProductById'])->name('product.details');

// QnA Routes (Public Access)
Route::get('/qna', [QnaController::class, 'index'])->name('qna.index');


// --- Auth Routes ---
Route::post('/auth/firebase-login', [FirebaseController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


// --- Protected Routes (Login Required) ---
Route::middleware(['auth'])->group(function () {

    // Profile Management
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

    // Admin Role Update (Only Admin)
    Route::put('/profile/update-role', [UserController::class, 'updateRole'])
        ->middleware('can:isAdmin')->name('profile.updateRole');

    // QnA Actions
    Route::post('/qna/questions', [QnaController::class, 'storeQuestion'])->name('qna.questions.store');
    Route::post('/qna/answers', [QnaController::class, 'storeAnswer'])->name('qna.answers.store');
    Route::post('/qna/upvote/{id}', [QnaController::class, 'upvote'])->name('qna.upvote');
    Route::delete('/qna/delete/{id}', [QnaController::class, 'destroy'])->name('qna.destroy');

    // Article Like
    Route::post('/articles/{article}/like', [ArticleController::class, 'toggleLike'])->name('articles.toggleLike');
    
    // Create Article
    Route::post('/profile/articles/add', [ArticleController::class, 'store'])->name('articles.add');
});

// --- Admin Only Routes ---
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/profile/products/add', [ProductController::class, 'store'])
        ->name('products.add');
});