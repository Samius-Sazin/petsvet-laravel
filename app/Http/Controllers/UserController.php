<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CloudinaryService;
use App\Services\ProfileStatsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

public function profile()
{
    $user = auth()->user(); 

    $roleKey = match ($user->role) {
        0 => 'admin',
        1 => 'user',
        2 => 'veterinary',
        default => 'user',
    };

    $cards = config("roleCards.{$roleKey}", []);

    $statsService = new ProfileStatsService($user);
    $counts = $statsService->getCounts();
    
    $counts['qna'] = $user->questions()->count();

    return view('pages.profile', compact('user', 'cards', 'counts'));
}

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'photo' => 'nullable|image|max:10240', // 10MB
        ]);

        // Upload Profile Photo
        if ($request->hasFile('photo')) {

            // If old image exists → delete from Cloudinary
            if ($user->photo_public_id) {
                try {
                    $this->cloudinary->deleteUserProfileImage($user->photo_public_id);
                } catch (\Exception $e) {
                    // Print the error if deletion fails
                    dd('Cloudinary delete error: ' . $e->getMessage());
                }
            }

            try {
                $upload = $this->cloudinary->uploadUserProfileImage(
                    $request->file('photo'),
                    '/profile_photos'
                );

                // Save new URL & public_id to DB
                $user->photo = $upload['url'];
                $user->photo_public_id = $upload['public_id'];

            } catch (\Exception $e) {
                dd($e->getMessage(), $e->getFile(), $e->getLine());
                return back()->with('error', 'Cloudinary error: ' . $e->getMessage());
            }
        }

        // Update other fields
        $user->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'bio' => $request->input('bio'),
        ]);

        return back()->with('update_profile_success', 'Profile updated successfully!');
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'role' => 'required|integer|in:0,1,2'
        ]);

        $user = User::where('email', $request->input('email'))->firstOrFail();
        $user->role = $request->input('role');
        $user->save();

        $user->refresh();

        return back()->with('update_user_role_success', 'User role updated!');
    }
}
