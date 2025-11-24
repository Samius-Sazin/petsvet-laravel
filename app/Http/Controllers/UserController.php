<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Show profile page.
     */
    public function profile()
    {
        // Always refresh authenticated user to avoid old data
        Auth::user()->refresh();

        return view('profile.profile', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update user profile.
     */
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

        // Handle profile photo upload
        if ($request->hasFile('photo')) {

        }

        // Update other fields
        $user->update([
            'name' => $request->name,
            'location' => $request->location,
            'bio' => $request->bio,
        ]);

        // Refresh user to update session data
        $user->refresh();

        return back()->with('success', 'Profile updated successfully!');
    }

    /**
     * (Optional) Update user role — Admin Only
     */
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

        return back()->with('success', 'User role updated!');
    }
}
