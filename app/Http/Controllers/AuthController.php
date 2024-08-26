<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
   public function Login(Request $request){
        $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)){
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([
        'token' => $token,
        'token_type' => 'Bearer',
        'user' => $user
        ]);
    }

    return response() -> json([
        'message' => 'Usuário invalido!',
    ], 401);
  }


  public function Register(Request $request){
     $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'token_type' => 'Bearer',
    ]);

  }

}
