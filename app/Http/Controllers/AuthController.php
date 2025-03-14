<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request)
    {


    
    }
    public function login(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed ',
                'errors' => $validator->errors(),
            ], 422);
        }

     
        $user = User::where('user_name', $request->user_name)->first();

   
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $randomStr = Str::random(40);

  
        $token = $user->createToken($randomStr)->plainTextToken;
$userID =$user->id;
        return response()->json([
            'token' => $token,
            'user_id'=>$userID
             
        ], 200);
      
    }
    public function logout(Request $request)
    {
        return 'Logout';
    }
}
