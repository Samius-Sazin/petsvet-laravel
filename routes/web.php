<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QnaController; 

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/articles', function () {
    return view('pages.articles');
})->name('articles');

Route::get('/community', function () {
    return view('pages.community');
})->name('community');

Route::get('/consultancy', function () {
    return view('pages.consultancy');
})->name('consultancy');

// --- Products Routes ---
Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'getProductById'])->name('product.details');

Route::get('/privacy-and-policy', function () {
    return view('pages.privacyAndPolicy');
})->name('privacy.policy');

// --- QnA Routes (Public Access) ---
Route::get('/qna', [QnaController::class, 'index'])->name('qna.index');


// --- Auth Routes ---
Route::post('/auth/firebase-login', [FirebaseController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


// --- Protected Routes (Login Required) ---
Route::middleware(['auth'])->group(function () {

    // Show profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // Update profile
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

    // Update role (Only Admin)
    Route::put('/profile/update-role', [UserController::class, 'updateRole'])
        ->middleware('can:isAdmin')->name('profile.updateRole');

    // QnA Actions
    Route::post('/qna/questions', [QnaController::class, 'storeQuestion'])->name('qna.questions.store');
    Route::post('/qna/answers', [QnaController::class, 'storeAnswer'])->name('qna.answers.store');
    Route::post('/qna/upvote/{id}', [QnaController::class, 'upvote'])->name('qna.upvote');

   
    Route::delete('/qna/delete/{id}', [QnaController::class, 'destroy'])->name('qna.destroy');
});

// --- Admin Only Routes ---
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/profile/products/add', [ProductController::class, 'store'])
        ->name('products.add');
});