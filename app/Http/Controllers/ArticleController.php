<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLike;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function getAllArticles(Request $request)
    {
        $query = Article::with('user');

        if ($request->query('category')) {
            $query->where('category', $request->query('category'));
        }

        if ($request->query('search')) {
            $keyword = $request->query('search');
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('content', 'like', "%{$keyword}%");
            });
        }

        $sort = $request->query('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $articles = $query->get();
        $userId = Auth::id();

        // Add like count and user like status to each article
        $articles->each(function ($article) use ($userId) {
            $article->likes_count = $article->getLikesCountAttribute();
            $article->is_liked = $article->isLikedByUser($userId);
        });

        // Get recent articles (latest 4) for the recent articles section
        $recentArticles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        $recentArticles->each(function ($article) use ($userId) {
            $article->likes_count = $article->getLikesCountAttribute();
            $article->is_liked = $article->isLikedByUser($userId);
        });

        return view('pages.articles', [
            'articles' => $articles,
            'recentArticles' => $recentArticles,
            'currentSort' => $sort,
            'currentCategory' => $request->query('category', null),
            'searchKeyword' => $request->query('search', ''),
        ]);
    }

    public function toggleLike(Request $request, Article $article)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to like articles'
            ], 401);
        }

        try {
            $userId = Auth::id();
            $articleId = $article->id;

            // Check if user already has a like record for this article
            $existingLike = ArticleLike::where('article_id', $articleId)
                ->where('user_id', $userId)
                ->first();

            if ($existingLike) {
                // Toggle the like status
                $existingLike->liked = !$existingLike->liked;
                $existingLike->save();
                $isLiked = $existingLike->liked;
            } else {
                // Create new like
                ArticleLike::create([
                    'article_id' => $articleId,
                    'user_id' => $userId,
                    'liked' => true,
                ]);
                $isLiked = true;
            }

            // Get updated like count
            $likesCount = $article->getLikesCountAttribute();

            return response()->json([
                'success' => true,
                'is_liked' => $isLiked,
                'likes_count' => $likesCount,
                'message' => $isLiked ? 'Article liked' : 'Article unliked'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to toggle like: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        // Only veterinarians and admins can create articles
        if (!Auth::check() || !in_array(Auth::user()->role, [\App\Models\User::ROLE_VET, \App\Models\User::ROLE_ADMIN])) {
            return redirect()->back()->with('error', 'Only veterinarians and admins can create articles.');
        }

        try {
            DB::beginTransaction();

            $data = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $uploadedImage = $this->cloudinary->uploadArticleImage(
                    $request->file('image'),
                    $data['title'],
                    '/articles'
                );
                $data['image'] = $uploadedImage['url'];
            }
                
            $data['user_id'] = auth()->id();

            Article::create($data);

            DB::commit();

            return redirect()->back()->with('add_article_success', 'Article added successfully!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }
}
