<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use finfo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = Region::all();
        if($region){

            return response()->json([
                'regions'=>$region,
                'message'=>'Sucess' 
            ]); 
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Region not found'
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
        $region = new Region();
        $region->name = request('name');
        $region->save();
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
        $region = Region::find($id);
        return response()->json([
        'region'=>$region,
        'message'=>'sucess'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::find($id);
        return response()->json([
        'region'=>$region,
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
        $region = new Region();
        $region->name = request('name');
        $region->update();
        return response()->json([
        'message'=>'region updated successfully'
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);
        if($region){
        $region->delete();
        return response()->json([
        'message'=>'region deleted successfully'
        ]);
        }
        else{
        return response()->json([
        'status'=>422,
        'message'=>'region to delete is not found'
        ]);
        }
    }
}
