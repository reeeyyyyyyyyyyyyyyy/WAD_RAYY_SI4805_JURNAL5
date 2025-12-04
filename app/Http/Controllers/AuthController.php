<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        /**
         * ==========1===========
         * Validate incoming registration data
         */
        $validator = Validator::make($request->all(), [
            // the request body are name, email and password
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users|max:255',
            'password'=>'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation failed',
                'errors'=>$validator->validator->errors()

            ], 422);
        }

        /**
         * =========2===========
         * Create new user and generate API token
         */
        $user = User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        /**
         * =========3===========
         * Return success response with user data and token
         */
        return response()->json([
            'message' => 'Registration successful',
            'data' => [
                'user' => $user,
                'token' =>$token
            ]
        ], 201);
    }


    public function login(Request $request)
    {
        /**
         * =========4===========
         * Validate incoming login data
         */
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login credentials'
            ], 401);
        }
        /**
         * =========5===========
         * Generate API token for authenticated user
         */
        $user = User::where('email', $request->email)->firstOrFail();
        $token =$user->createToken('auth_token')->plainTextToken;

        /**
         * =========6===========
         * Return success response with user data and token
         */
        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        /**
         * =========7===========
         * Revoke the token that was used to authenticate the current request
         */
        $request->user()->currentAccessToken()->delete();

        /**
         * =========8===========
         * Return success response
         */
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
