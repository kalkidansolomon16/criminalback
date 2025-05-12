<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PrisonerApperance;
use Illuminate\Support\Facades\Validator;

class PrisionerApperanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prisionerApperance = PrisonerApperance::with('hair','eye','teeth','lip','ear','nose')->get();
        if($prisionerApperance){
            return response()->json([
                'prisionerApperance'=>$prisionerApperance,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'PrisionerApperance not found'
            ]);
        }
        if($prisionerApperance){
            return response()->json([
                'prisionerApperance'=>$prisionerApperance,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'PrisionerApperance not found'
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
            'prision_history_id'=>'required',
            'hair_type_id'=>'required',
            'height'=>'required',
            'face'=>'required',
            'forehead'=>'required',
            'nose'=>'required',
            'eye_color'=>'required',
            'teeth'=>'required',
            'lip'=>'required',
            'ear'=>'required',
            'unique_appearance'=>'required',
            'citizenship'=>'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerApperance = new PrisonerApperance();
            $prisionerApperance->prision_history_id = request('prision_history_id');
            $prisionerApperance->hair_type_id = request('hair_type_id');
            $prisionerApperance->height = request('height');
            $prisionerApperance->face = request('face');
            $prisionerApperance->forehead = request('forehead');
            $prisionerApperance->nose = request('nose');

            $prisionerApperance->eye_color = request('eye_color');
            $prisionerApperance->teeth = request('teeth');

            $prisionerApperance->lip = request('lip');
            $prisionerApperance->ear = request('ear');
            $prisionerApperance->unique_appearance = request('unique_appearance');
            $prisionerApperance->citizenship = request('citizenship');
                    $prisionerApperance->save();
            return response()->json([
                'message'=>"prisionerApperance added Successfully",
                'prisionerApperance'=> $prisionerApperance
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $PrisionerApperance =PrisonerApperance::find($id);
        if($PrisionerApperance){
            return response()->json([
                'PrisionerApperance'=>$PrisionerApperance,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'PrisionerApperance Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $PrisionerApperance =PrisonerApperance::find($id);
        if($PrisionerApperance){
            return response()->json([
                'PrisionerApperance'=>$PrisionerApperance,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'PrisioPrisionerApperance status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
           'PrisionerApperance_unique_number'=>'required',
           'prision_unique_number'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'mother_name'=>'required',
            'sex'=>'required',
            'birth_district'=>'required',
            'birth_town_id'=>'required',
            'ethnic_group_id'=>'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerApperance = PrisonerApperance::findOrFail($id);
    
        
            $prisionerApperance->prision_history_id = request('prision_history_id');
            $prisionerApperance->hair_type_id = request('hair_type_id');
            $prisionerApperance->height = request('height');
            $prisionerApperance->face = request('face');
            $prisionerApperance->forehead = request('forehead');
            $prisionerApperance->nose = request('nose');

            $prisionerApperance->eye_color = request('eye_color');
            $prisionerApperance->teeth = request('teeth');

            $prisionerApperance->lip = request('lip');
            $prisionerApperance->ear = request('ear');
            $prisionerApperance->unique_appearance = request('unique_appearance');
            $prisionerApperance->citizenship = request('citizenship');
            $prisionerApperance->update();
            return response()->json([
                'message'=>"PrisioPrisionerApperance updated Successfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $PrisioPrisionerApperance = PrisonerApperance::find($id);
        if($PrisioPrisionerApperance){
            $PrisioPrisionerApperance->delete();
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
