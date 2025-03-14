<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return response()->json([
            'user'=>$user,
            'message'=>'Success'
        ]);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'full_name' => 'required|max:255',
            'sex_id' => 'required',
            'age' => 'required',
            'password' => 'required|min:8',
            'user_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            // 'criminal_id' => 'required',
            'role_id' => 'required',
            'photo' => 'sometimes|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $user = new User();
            $user->full_name = request('full_name');
            $user->sex_id = request('sex_id');
            $user->age = request('age');
            $user->password = (Hash::make(request('password')));
            $user->user_name = request('user_name');
            $user->address = request('address');
            $user->phone_number = request('phone_number');
            $user->role_id = request('role_id');
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('img'), $photoName);
                $user->photo = 'img/' . $photoName;
            }
            $user->save();
            return response()->json([
                'message'=>"user Successfully"
            ]);
    }
    }
    public function show(string $id)
    {
        $User = User::find($id);
        if($User){
            return response()->json([
                'User'=>$User,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Useral Level Not Found'
            ]);
        }
    }
    public function edit(string $id)
    {
        $User = User::find($id);
        if($User){
            return response()->json([
                'Criminal'=>$User,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'criminalal status not found'

            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        $validation = Validator::make($request->all(),[
            'full_name' => 'required|max:255',
            'sex_id' => 'required',
            'age' => 'required',
            'password' => 'required|min:8',
            'user_name' => 'required|user_name|unique:users',
            'address' => 'required',
            'phone_number' => 'required',
            // 'criminal_id' => 'required',
            'role_id' => 'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $user = user::new();
            $user->full_name = request('full_name');
            $user->sex_id = request('sex_id');
            $user->age = request('age');
            $user->password = request('password');
            $user->user_name = request('user_name');
            $user->address = request('address');
            $user->phone_number = request('phone_number');
            $user->role_id = request('role_id');
            $user->update();
            return response()->json([
                'user'=>$user,
                'message'=>'Success'
            ]);
            return $user;
    }
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json([
                'message'=>'useral Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'useral level with this id not foud'
            ]);
        }
    }
}
