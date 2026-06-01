<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'messege' => 'validation error',
                'error' => $validate->errors(),
            ]);
        }
        $data = $validate->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response()->json([
            'mesg' => 'Created Successufly',
            'data' => $user

        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'mesg' => 'Invalid Email or Password',
                'data' => null,
            ]);
        }
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
