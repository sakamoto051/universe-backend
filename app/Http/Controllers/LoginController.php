<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Exception;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function logout()
    {
        Auth::guard('sanctum')->user()->tokens()->delete();
    }
}
