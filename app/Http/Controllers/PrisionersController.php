<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class PrisionersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Prisioner = Prisioner::with([
          
             'birthRegion',
             'birthTown',  
             'birthCity',  
             'currentRegion', 
             'currentTown',  
             'currentCity',  
             'educationalLevel',
             'ethnicGroup',
             'religion',
             'closestRespondentRegion',
             'closestRespondentTown',
             'closestRespondentCity',
             'crime',
             'criminalType', 
             'arrestCourt',  
             'verdictCourt', 
             'updatedVerdictCourt', 
             'user'
         ])->get();
        if($Prisioner){
            return response()->json([
                'Prisioner'=>$Prisioner,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Prisioner not found'
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
            'prisioner_unique_number'=>'required',
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
            $Prisioner = new Prisioner();
            $Prisioner->prisioner_unique_number = request('prisioner_unique_number');
            $Prisioner->prision_unique_number = request('prision_unique_number');
            $Prisioner->first_name = request('first_name');
            $Prisioner->middle_name = request('middle_name');
            $Prisioner->last_name = request('last_name');
            $Prisioner->date_of_birth = request('date_of_birth');
            // $Prisioner->last_name = request('last_name');
            // $Prisioner->date_of_birth = request('date_of_birth');
            $Prisioner->mother_name = request('mother_name');
            $Prisioner->sex = request('sex');
            // $Prisioner->birth_place = request('birth_place');
            $Prisioner->birth_district = request('birth_district');
            $Prisioner->birth_town_id = request('birth_town_id');
            $Prisioner->ethnic_group_id = request('ethnic_group_id');
                    $Prisioner->save();
            return response()->json([
                'message'=>"Prisioner added Successfully",
                'prisioner'=> $Prisioner
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Prisioner = Prisioner::with([
          
            'birthRegion',
            'birthTown',  
            'birthCity',  
            'currentRegion', 
            'currentTown',  
            'currentCity',  
            'educationalLevel',
            'ethnicGroup',
            'religion',
            'closestRespondentRegion',
            'closestRespondentTown',
            'closestRespondentCity',
            'crime',
            'criminalType', 
            'arrestCourt',  
            'verdictCourt', 
            'updatedVerdictCourt', 
            'user'
        ])->find($id);
        if($Prisioner){
            return response()->json([
                'Prisioner'=>$Prisioner,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Prisioner Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Prisioner = Prisioner::find($id);
        if($Prisioner){
            return response()->json([
                'Prisioner'=>$Prisioner,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Prisioner status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
           'prisioner_unique_number'=>'required',
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
            $Prisioner = new Prisioner();
            $Prisioner->prisioner_unique_number = request('prisioner_unique_number');
            $Prisioner->prision_unique_number = request('prision_unique_number');
            $Prisioner->first_name = request('first_name');
            $Prisioner->middle_name = request('middle_name');
            $Prisioner->last_name = request('last_name');
            $Prisioner->date_of_birth = request('date_of_birth');
            $Prisioner->last_name = request('last_name');
            $Prisioner->date_of_birth = request('date_of_birth');
            $Prisioner->mother_name = request('mother_name');
            $Prisioner->sex = request('sex');
            // $Prisioner->birth_place = request('birth_place');
            $Prisioner->birth_district = request('birth_district');
            $Prisioner->birth_town_id = request('birth_town_id');
            $Prisioner->ethnic_group_id = request('ethnic_group_id');
            $Prisioner->update();
            return response()->json([
                'message'=>"Prisioner updated Successfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Prisioner = Prisioner::find($id);
        if($Prisioner){
            $Prisioner->delete();
            return response()->json([
                'message'=>'Prisioner  Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'Prisioner with this id not foud'
            ]);
        }
    }
}
