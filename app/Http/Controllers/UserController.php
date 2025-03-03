<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        $fields = $request->validate([
            'full_name' => 'required|max:255',
            'sex' => 'required',
            'age' => 'required',
            'password' => 'required|min:8',
            'user_name' => 'required|user_name|unique:users',
            'address' => 'required',
            'phone_number' => 'required',
            'criminal_id' => 'required',
            'role_id' => 'required',
        ]);
    

        $user = User::create($fields);

        return response()->json(['user' => $user], 201);
    }

    public function show(User $user)
    {
        return ['data' => $user];
    }


    public function update(Request $request, User $user)
    {
        $fields = $request->validate([
            'full_name' => 'required|max:255',
            'sex' => 'required',
            'age' => 'required',
            'password' => 'required|min:8',
            'user_name' => 'required|user_name|unique:users',
            'address' => 'required',
            'phone_number' => 'required',
            'criminal_id' => 'required',
            'role_id' => 'required',
            
        ]);
        $user->update($fields);
        return $user;
    }


    public function destroy(User $user)
    {
        $user->delete();
        return ['message' =>'user deleted successfully!'];
    }
}
