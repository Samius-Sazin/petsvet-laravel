<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function index()
    {
        $posts = Post::with('user', 'comments.user')->latest()->get();
        $userId = Auth::id();

        $posts->each(function ($post) use ($userId) {
            $post->likes_count = $post->getLikesCountAttribute();
            $post->is_liked = $post->isLikedByUser($userId);
        });

        return view('pages.community', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validate([
                'post_text' => 'required|string|max:5000',
                'feeling' => 'nullable|string|max:50',
                'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            ]);

            $postData = [
                'user_id' => auth()->id(),
                'content' => $data['post_text'],
                'feeling' => $data['feeling'] ?? null,
            ];

            if ($request->hasFile('post_image')) {
                $uploadedImage = $this->cloudinary->uploadPostImage(
                    $request->file('post_image'),
                    auth()->id()
                );
                $postData['image_url'] = $uploadedImage['url'];
            }
            
            Post::create($postData);

            DB::commit();

            return redirect()->route('community')->with('success', 'Your post has been shared!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Post creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while sharing your post.');
        }
    }

    public function toggleLike(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);
            $user = Auth::user();

            if (!$user) {
                // This case might not be hit if route is protected by auth middleware, but it's good practice
                return redirect()->route('login');
            }

            $like = $post->likes()->where('user_id', $user->id)->first();

            if ($like) {
                $like->delete();
            } else {
                $post->likes()->create(['user_id' => $user->id]);
            }

            return redirect()->route('community');

        } catch (\Exception $e) {
            Log::error('Toggle like failed: ' . $e->getMessage());
            return redirect()->route('community')->with('error', 'An error occurred while processing your request.');
        }
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        try {
            $post = Post::findOrFail($postId);
            
            $post->comments()->create([
                'user_id' => Auth::id(),
                'body' => $request->body,
            ]);

            return redirect()->route('community')->with('success', 'Your comment has been posted!');

        } catch (\Exception $e) {
            Log::error('Comment creation failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while posting your comment.');
        }
    }
}