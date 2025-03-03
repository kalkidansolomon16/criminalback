<?php

namespace App\Http\Controllers;

use App\Models\HairType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HairTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hair = HairType::all();
        if($hair){
            return response()->json([
                'message'=>'Sucess',
                'hair'=>$hair
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Hair type not found'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
$hair = new HairType();
$hair->type = request('type');
$hair->save();
return response()->json([
    'status'=>200,
    'message'=>'Hair Type added successfully'
]);
    }}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hair = HairType::find($id);
        if($hair){
            return response()->json([
                'status'=>200,
                'hair'=>$hair
            ]);
        }

        else{
            return response()->json([
                'status'=>500,
                'message'=>'Hair Type Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hair = HairType::find($id);
        if($hair){
            return response()->json([
                'status'=>200,
                'hair'=>$hair
            ]);
        }
        
        else{
            return response()->json([
                'status'=>500,
                'message'=>'Hair Type Not Found'
            ]);
        }
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
            $hair = new HairType();
            $hair->name = request('name');
            $hair->update();
            return response()->json([
            'message'=>'hairType updated successfully'
            ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hair = HairType::find($id);
        if($hair){
            $hair->delete();
            return response()->json([
                'message'=>'hairal Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'hairal level with this id not foud'
            ]);
        }
    }
}
