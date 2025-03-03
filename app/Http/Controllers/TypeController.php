<?php

namespace App\Http\Controllers;

use finfo;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::all();
        if($type){

            return response()->json([
                'types'=>$type,
                'message'=>'Sucess' 
            ]); 
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'type not found'
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
         'type'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $type = new Type();
        $type->type = request('type');
        $type->save();
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
        $type = Type::find($id);
        return response()->json([
        'type'=>$type,
        'message'=>'sucess'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = Type::find($id);
        return response()->json([
        'type'=>$type,
        'message'=>'sucess'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
        'type'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $type = new Type();
        $type->type = request('type');
        $type->update();
        return response()->json([
        'message'=>'type updated successfully'
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        if($type){
        $atype->delete();
        return response()->json([
        'message'=>'type deleted successfully'
        ]);
        }
        else{
        return response()->json([
        'status'=>422,
        'message'=>'type to delete is not found'
        ]);
        }
    }
}
