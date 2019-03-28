<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login() {
        $credentials = request(['email', 'password']);

        if(!$token = \auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized for '.\request('email')],401);
        }

        return $this->respondWithToken($token);
    }



    public function logout() {
        \auth('api')->logout();
        return response()->json(['message' => "Logged out"]);
    }

    public function refresh() {
        return $this->respondWithToken(\auth('api')->refresh());
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => \auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
