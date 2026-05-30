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
        $users = User::paginate(10);
        return response()->json([
            'data' => $users,
            'message' => 'Success'
        ]);
    }

    public function singleUser()
    {
        $user = User::find(request('user_id'));
        return response()->json([
            'user' => $user,
            'message' => 'Success'
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'full_name'     => 'required|string|max:255',
            'sex'           => 'required',
            'age'           => 'required|integer|min:0|max:120',
            'password'      => 'required|string|min:8',
            'user_name'     => 'required|string|max:255|unique:users,user_name',
            'address'       => 'required|string|max:255',
            'phone_number'  => 'required|string|regex:/^[0-9+\-\s]{7,15}$/',
            'role'          => 'required|string',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'signature'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',


     ],
    [
        'full_name.required' => 'ሙሉ ስም ያስገቡ',      
        'sex.required' => 'ጾታ ይምረጡ',
        'age.required' => 'እድሜ ያስገቡ', 
        'password.required' => 'የይለፍ ቃል ያስገቡ',
        'user_name.required' => 'የተጠቃሚ ስም ያስገቡ',
        'address.required' => 'አድራሻ ያስገቡ',
        'phone_number.required' => 'ስልክ ቁጥር ያስገቡ',
        'role.required' => 'ሚና ይምረጡ',
        'photo.sometimes' => 'ፎቶ ይምረጡ',
        'signature.sometimes' => 'ፊርማ ይምረጡ',
    ]);

        if($validation->fails()){
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }
        $user = new User();

        if(request('user_id')) {
            $user = User::find(request('user_id'));
        }

        if(!request('password')) $user->password = Hash::make('12345678');
        $user->full_name = request('full_name');
        $user->sex = request('sex');
        $user->age = request('age');
        $user->password = (Hash::make(request('password')));
        $user->user_name = request('user_name');
        $user->address = request('address');
        $user->phone_number = request('phone_number');
        $user->role = request('role');
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $user->photo = 'img/' . $photoName;
        }
        if ($request->hasFile('signature')) {
            $photo = $request->file('signature');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $user->signature = 'img/' . $photoName;
        }

        
        $user->save();
        return response()->json([
            'users'=>$user,
            'message'=>"user Successfully"
        ]);

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
            'full_name'     => 'required|string|max:255',
            'sex'           => 'required',
            'age'           => 'required|integer|min:0|max:120',
            'password'      => 'nullable|string|min:8|confirmed',
            'user_name'     => 'required|string|max:255|unique',
            'address'       => 'required|string|max:255',
            'phone_number'  => 'required|string|regex:/^[0-9+\-\s]{7,15}$/',
            'role'          => 'required|string',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'signature'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            
        ],
    [
        'full_name.required' => 'ሙሉ ስም ያስገቡ',
        'sex_id.required' => 'ጾታ ይምረጡ',
        'age.required' => 'እድሜ ያስገቡ',
        'password.required' => 'የይለፍ ቃል ያስገቡ',
        'user_name.required' => 'የተጠቃሚ ስም ያስገቡ',
        'address.required' => 'አድራሻ ያስገቡ',
        'phone_number.required' => 'ስልክ ቁጥር ያስገቡ',
        'role_id.required' => 'ሚና ይምረጡ',
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
            if ($request->hasFile('signature')) {
                $photo = $request->file('signature');
                $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('img'), $photoName);
                $user->signature = 'img/' . $photoName;
            }
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('img'), $photoName);
                $user->photo = 'img/' . $photoName;
            }

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
