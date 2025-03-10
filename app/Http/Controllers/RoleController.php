<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use finfo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Role = Role::all();
        if($Role){

            return response()->json([
                'Roles'=>$Role,
                'message'=>'Sucess' 
            ]); 
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Role not found'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
         'name'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $Role = new Role();
        $Role->name = request('name');
        $Role->name = request('type');
        $Role->save();
        return response()->json([
            'message'=>'Success'
        ]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Role = Role::find($id);
        return response()->json([
        'Role'=>$Role,
        'message'=>'sucess'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Role = Role::find($id);
        return response()->json([
        'Role'=>$Role,
        'message'=>'sucess'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
        'name'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $Role = new Role();
        $Role->name = request('name');
        $Role->name = request('type');
        $Role->update();
        return response()->json([
        'message'=>'Role updated successfully'
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Role = Role::find($id);
        if($Role){
        $Role->delete();
        return response()->json([
        'message'=>'Role deleted successfully'
        ]);
        }
        else{
        return response()->json([
        'status'=>422,
        'message'=>'Role to delete is not found'
        ]);
        }
    }
}
