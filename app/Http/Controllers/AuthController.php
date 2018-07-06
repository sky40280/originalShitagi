<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $data = $request->only(['email', 'password']);
        $user = new User($data);
        $user->save();
        $user = User::find($user->id);
        return response()->json([
            'status' => 201,
            'message' => '',
            'data' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => ['token' => $token]
        ], 200);
    }

    public function getUser(Request $request)
    {
        JWTAuth::parseToken();

        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function index(Request $request)
    {
        return User::all();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->update($data);
        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => $user
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => ''
        ], 200);
    }
}
