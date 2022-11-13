<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use Throwable;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request['email'];
        try {
            $user = User::where('email', '=', $email)->first();
            return $user;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}
