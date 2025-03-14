<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Court;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $court = Court::all();
        if($court){
            return response()->json([
                'court'=>$court,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'court not found'
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
            'name'=>'required'
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $court = Court::new();
            $court->name = request('name');
            $court->save();
            return response()->json([
                'message'=>"court added Successfully"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $court = Court::find($id);
        if($court){
            return response()->json([
                'court'=>$court,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'courtal  Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $court = Court::find($id);
        if($court){
            return response()->json([
                'courtalLevel'=>$court,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'court not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'name'=>'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $court = Court::new();
            $court->name = request('name');
            $court->update();
            return response()->json([
                'message'=>"court added Successfully"
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $court = Court::find($id);
        if($court){
            $court->delete();
            return response()->json([
                'message'=>'court Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'courtal  with this id not foud'
            ]);
        }
    }
}
