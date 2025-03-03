<?php

namespace App\Http\Controllers;


use App\Models\CriminalProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CriminalPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = CriminalProperty::all();
        if($property){
            return response()->json([
                'message'=>'Sucess',
                'property'=>$property
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'property type not found'
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
            'criminal_id'=>'required',
            'type'=>'required',
            'amount'=>'required',
            'user_id'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
$property = new CriminalProperty();
$property->criminal_id = request('criminal_id');
$property->type = request('type');
$property->amount = request('amount');
$property->user_id = request('user_id');
$property->save();
return response()->json([
    'status'=>200,
    'message'=>'property Type added successfully'
]);
    }}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = CriminalProperty::find($id);
        if($property){
            return response()->json([
                'status'=>200,
                'property'=>$property
            ]);
        }

        else{
            return response()->json([
                'status'=>500,
                'message'=>'property Type Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = CriminalProperty::find($id);
        if($property){
            return response()->json([
                'status'=>200,
                'property'=>$property
            ]);
        }
        
        else{
            return response()->json([
                'status'=>500,
                'message'=>'property Type Not Found'
            ]);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'criminal_id'=>'required',
            'type'=>'required',
            'amount'=>'required',
            'user_id'=>'required'
            ]);
            if($validation->fails()){
            return response()->json([
            'status'=>422,
            'message'=>$validation->messages()
            ]);
            }
            else{
            $property = new CriminalProperty();
            $property->criminal_id = request('criminal_id');
$property->type = request('type');
$property->amount = request('amount');
$property->user_id = request('user_id');
            $property->update();
            return response()->json([
            'message'=>'CriminalProperty updated successfully'
            ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = CriminalProperty::find($id);
        if($property){
            $property->delete();
            return response()->json([
                'message'=>'propertyal Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'propertyal level with this id not foud'
            ]);
        }
    }
}
