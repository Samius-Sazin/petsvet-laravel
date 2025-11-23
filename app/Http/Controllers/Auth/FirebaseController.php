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

        $user = User::updateOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['name'],
                'photo' => $data['photo'],
                'password' => bcrypt(uniqid())
            ]
        );

        Auth::login($user);

        return response()->json(['success' => true]);
    }
}
