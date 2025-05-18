<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\pris;
use App\Models\Prisioner_property;
use Illuminate\Support\Facades\Validator;

class PrisionerPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prisionerProperty = Prisioner_property::with('type')->get();
        if($prisionerProperty){
            return response()->json([
                'prisionerProperty'=>$prisionerProperty,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'PrisionerProperty not found'
            ]);
        }
        if($prisionerProperty){
            return response()->json([
                'prisionerProperty'=>$prisionerProperty,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'prisionerProperty not found'
            ]);
        }
    }

    /**
     * Show the pri for creating a new resource.
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
            'prision_history_id'=>'required',
            'type_id'=>'required',
            'amount'=>'required',
            'description'=>'required',
           
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerProperty = new Prisioner_property();
            $prisionerProperty->prision_history_id = request('prision_history_id');
            $prisionerProperty->type_id = request('type_id');
            $prisionerProperty->amount = request('amount');
            $prisionerProperty->description = request('description');
            $prisionerProperty->date_received = request('date_received');
            $prisionerProperty->date_returned = request('date_returned');

                    $prisionerProperty->save();
            return response()->json([
                'message'=>"prisionerProperty added Successfully",
                'prisionerProperty'=> $prisionerProperty
            ]);
        }
        
    }
    public function show(string $id)
    {
        $prisionerProperty = Prisioner_property::find($id);
        if($prisionerProperty){
            return response()->json([
                'prisionerProperty'=>$prisionerProperty,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'prisionerProperty Not Found'
            ]);
        }
    }

    /**
     * Show the pri for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prisionerProperty =Prisioner_property::find($id);
        if($prisionerProperty){
            return response()->json([
                'prisionerProperty'=>$prisionerProperty,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'PrisioprisionerProperty status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'prision_history_id'=>'required',
            'type_id'=>'required',
            'amount'=>'required',
            'description'=>'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerProperty = new  Prisioner_property();
        
            $prisionerProperty->prision_history_id = request('prision_history_id');
            $prisionerProperty->type_id = request('type_id');
            $prisionerProperty->amount = request('amount');
            $prisionerProperty->description = request('description');
            $prisionerProperty->date_received = request('date_received');
            $prisionerProperty->date_returned = request('date_returned');

            $prisionerProperty->update();
            return response()->json([
                'message'=>"PrisioprisionerProperty updated Successfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prisionerProperty = Prisioner_property::find($id);
        if($prisionerProperty){
            $prisionerProperty->delete();
            return response()->json([
                'message'=>'PrisioPrisionerApperanceal Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'PrisioPrisionerApperanceal level with this id not foud'
            ]);
        }
    }
}
