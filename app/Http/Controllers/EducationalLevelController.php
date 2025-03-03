<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationalLEvel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EducationalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = EducationalLEvel::all();
        if($education){
            return response()->json([
                'educationalLevel'=>$education,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'EducationalLevel not found'
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
            $education = EducationalLEvel::new();
            $education->name = request('name');
            $education->save();
            return response()->json([
                'message'=>"educational Level added Successfully"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $education = EducationalLEvel::find($id);
        if($education){
            return response()->json([
                'educationalLevel'=>$education,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Educational Level Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = EducationalLEvel::find($id);
        if($education){
            return response()->json([
                'educationalLevel'=>$education,
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = EducationalLEvel::find($id);
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
