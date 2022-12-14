<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Exception;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['name' => Auth::user()->email], 200);
        }

        throw new Exception('ログインに失敗しました。再度お試しください');
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::guard('sanctum')->user()->tokens()->delete();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        $res = ['message' => 'logout!'];
        return response()->json($res, Response::HTTP_OK);
    }
}
