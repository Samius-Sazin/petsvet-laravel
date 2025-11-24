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
            // Existing user: update only name & photo (NOT role)
            $user->update([
                'name' => $data['name'],
                'photo' => $data['photo'],
            ]);
        } else {
            // New user: create with default role USER
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
