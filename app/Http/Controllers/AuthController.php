<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $user = User::where('user_name', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 422);
        }

        $randomStr = Str::random(40);
        $token = $user->createToken($randomStr)->plainTextToken;
        $user_id = $user->id;
        $role = $user->role;

        return response()->json([
            'token' => $token,
            'user_id'=>$user_id,
            'role'=>$role
        ], 200);

    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }
}
