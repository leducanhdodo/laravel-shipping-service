<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return UserResource
     */
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
