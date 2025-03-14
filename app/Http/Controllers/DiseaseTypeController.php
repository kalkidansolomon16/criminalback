<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DiseaseType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DiseaseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deasesType = DiseaseType::all();
        if($deasesType){
            return response()->json([
                'deasesType'=>$deasesType,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'deasesTypealLevel not found'
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
            $deasesType = DiseaseType::new();
            $deasesType->name = request('name');
            $deasesType->save();
            return response()->json([
                'message'=>"deasesTypeal Level added Successfully"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deasesType = DiseaseType::find($id);
        if($deasesType){
            return response()->json([
                'deasesType'=>$deasesType,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'deasesTypeal Level Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deasesType = DiseaseType::find($id);
        if($deasesType){
            return response()->json([
                'deasesTypealLevel'=>$deasesType,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Educational status not found'

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
            $deasesType = DiseaseType::new();
            $deasesType->name = request('name');
            $deasesType->update();
            return response()->json([
                'message'=>"deasesTypeal Level added Successfully"
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = DiseaseType::find($id);
        if($education){
            $education->delete();
            return response()->json([
                'message'=>'Educational Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'Educational level with this id not foud'
            ]);
        }
    }
}
