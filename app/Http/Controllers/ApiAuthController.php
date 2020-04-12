<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate(['email' => 'required|string', 'password' => 'required|string',]);
        if (!Auth::attempt($login)) {
            return response()->json(['code' => 16004001, 'message' => 'Invalid credential'])->setStatusCode(401);
        }
        $accessToken = Auth::user()->createToken('ApiAuthToken')->accessToken;
        return response()->json(['user' => Auth::user(), 'access_token' => $accessToken]);
    }
}
