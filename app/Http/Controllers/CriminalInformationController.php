<?php

namespace App\Http\Controllers;

use App\Models\criminalInformation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class criminalInformationInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criminalInformation = criminalInformation::all();
        if($criminalInformation){
            return response()->json([
                'criminalInformation'=>$criminalInformation,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'criminalInformation not found'
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
            'height'=>'required',
            'Hair_id'=>'required',
            'face'=>'required',
            'Forehead '=>'required',
            'nose'=>'required',
            'Eye_color'=>'required',
            'teeth'=>'required',
            'lip'=>'required',
            'ear'=>'required',
            'Unique_appearance'=>'required',
            
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $criminalInformation = criminalInformation::new();
            $criminalInformation->criminal_id = request('criminal_id');
            $criminalInformation->height = request('height');
            $criminalInformation->Hair_id = request('Hair_id');
            $criminalInformation->face = request('face');
            $criminalInformation->Forehead  = request('Forehead ');
            $criminalInformation->nose = request('nose');
            $criminalInformation->Eye_color = request('Eye_color');
            $criminalInformation->teeth = request('teeth');
            $criminalInformation->lip = request('lip');
            $criminalInformation->ear = request('ear');
            $criminalInformation->Unique_appearance = request('Unique_appearance');
            
            
            $criminalInformation->save();
            return response()->json([
                'message'=>"criminalInformational Level added Successfully"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $criminalInformation = criminalInformation::find($id);
        if($criminalInformation){
            return response()->json([
                'criminalInformation'=>$criminalInformation,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'criminalInformational Level Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $criminalInformation = criminalInformation::find($id);
        if($criminalInformation){
            return response()->json([
                'criminalInformation'=>$criminalInformation,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'criminalInformational status not found'

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
            'height'=>'required',
            'Hair_id'=>'required',
            'face'=>'required',
            'Forehead '=>'required',
            'nose'=>'required',
            'Eye_color'=>'required',
            'teeth'=>'required',
            'lip'=>'required',
            'ear'=>'required',
            'Unique_appearance'=>'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }

        else{
            $criminalInformation = criminalInformation::new();
            $criminalInformation->criminal_id = request('criminal_id');
            $criminalInformation->height = request('height');
            $criminalInformation->Hair_id = request('Hair_id');
            $criminalInformation->face = request('face');
            $criminalInformation->Forehead  = request('Forehead ');
            $criminalInformation->nose = request('nose');
            $criminalInformation->Eye_color = request('Eye_color');
            $criminalInformation->teeth = request('teeth');
            $criminalInformation->lip = request('lip');
            $criminalInformation->ear = request('ear');
            $criminalInformation->Unique_appearance = request('Unique_appearance');
            $criminalInformation->update();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $criminalInformation = criminalInformation::find($id);
        if($criminalInformation){
            $criminalInformation->delete();
            return response()->json([
                'message'=>'criminalInformational Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'criminalInformational level with this id not foud'
            ]);
        }
    }
}
