<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Регистрация
    public function registration(RegisterRequest $request)
    {
        User::create($request->all());

        return response()->json([
            "success" => true,
        ], 201);
    }

    // Авторизация
    public function auth(AuthRequest $request)
    {        
        if (!Auth::attempt($request->only("email","password"))) 
        {
            return response()->json([
                "message" => "Invalid data",
                "errors" => [
                    "Invalid data"
                ],
            ], 422);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            "token"=> $user->createToken("token of user $user->email}")->plainTextToken,
        ], 200);
    }
}
