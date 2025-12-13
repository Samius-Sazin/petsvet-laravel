<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FirebaseController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('uid', 'name', 'email', 'photo');

        // Check if user already exists
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            // Existing user: preserve their name and photo from DB
            // Only update photo if user has never uploaded one (no photo_public_id)
            if (empty($user->photo_public_id)) {
                $user->update(['photo' => $data['photo']]);
            }
            // Do NOT update name or photo if they exist in DB
        } else {
            // New user: create with Google data (name & photo)
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'photo' => $data['photo'],
                'password' => bcrypt(uniqid()),
                'role' => User::ROLE_USER,
                'location' => null,
                'bio' => null,
            ]);
        }

        Auth::login($user);

        return response()->json(['success' => true]);
    }
}
