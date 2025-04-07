<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrisonerApperance;
use App\Models\PrisionHistory;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                'Prisioner' => $Prisioner,
                'message' => 'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Prisioner not found'
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
    public function storeBasicInformation(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'mother_name' => 'required',
            'sex' => 'required',
            'birth_district' => 'required',
            'birth_town_id' => 'required',
            'ethnic_group_id' => 'required',
            
        ]);

        if($validation->fails()){
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }

        try {
            DB::beginTransaction();
            $Prisioner = new Prisioner();
            $Prisioner->prisioner_unique_number = mt_rand(1, 9999999); // the System can assign a unique number
            $Prisioner->prision_unique_number = mt_rand(1, 9999999);
            
            $Prisioner->first_name = request('first_name');
            $Prisioner->middle_name = request('middle_name');
            $Prisioner->last_name = request('last_name');
            $Prisioner->date_of_birth = request('date_of_birth');
            $Prisioner->mother_name = request('mother_name');
            $Prisioner->sex = request('sex');
            $Prisioner->birth_district = request('birth_district');
            $Prisioner->birth_town_id = request('birth_town_id');
            $Prisioner->ethnic_group_id = request('ethnic_group_id');
            $Prisioner->save();
            
            $prisonHistory = new PrisionHistory();  
            $prisonHistory->prisioner_id = $Prisioner->id;
            $prisonHistory->user_id = Auth::id();
            $prisonHistory->save();
            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => "Prisioner added Successfully",
            'prison_history_id' => $prisonHistory->id,
        ]);
    }

    public function storePersonalInfo(Request $request) {
        $validation = Validator::make($request->all(),[
            'prison_history_id' => 'required',
			'phone_number' => 'required',
			'closest_respondent' => 'required',
			'closest_respondent_district' => 'required',
			'religion_id' => 'required',
			'mobile_number' => 'required',
			'closest_respondent_town_id' => 'required',
			'current_district' => 'required',
			'job' => 'required',
			'current_city_id' => 'required',
			'educational_level_id' => 'required',
            
        ]);

        if($validation->fails()){
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }

        $prisonHistory = PrisionHistory::find($request->prison_history_id);
        if(!$prisonHistory) {
            return response()->json([
                'message' => 'Prison History not found!',
            ], 422);
        }

        $prisonHistory->phone_number = $request->phone_number; 
        $prisonHistory->closest_respondent = $request->closest_respondent; 
        $prisonHistory->closest_respondent_district = $request->closest_respondent_district; 
        $prisonHistory->religion_id = $request->religion_id; 
        $prisonHistory->mobile_number = $request->mobile_number; 
        $prisonHistory->closest_respondent_town_id = $request->closest_respondent_town_id; 
        $prisonHistory->current_district = $request->current_district; 
        $prisonHistory->job = $request->job; 
        $prisonHistory->current_city_id = $request->current_city_id; 
        $prisonHistory->educational_level_id = $request->educational_level_id; 

        $prisonHistory->save();

        return response()->json([
            'message' => "Prisioner Personal Informations Saved Successfully",
        ]);
    }

    public function storeApperance(Request $request) {
        $validation = Validator::make($request->all(),[
            'prison_history_id' => 'required',
            'hair_type_id' => 'required',
            'nose_id' => 'required',
            'eye_id' => 'required',
            'teeth_id' => 'required',
            'lip_id' => 'required',
            'ear_id' => 'required',
            'height' => 'required',
            'face' => 'required',
            'forehead' => 'required',
            'unique_appearance' => 'required',
            'extra_description' => 'required',
            'citizenship' => 'required',
            
        ]);

        if($validation->fails()){
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }

        $prisonHistory = PrisionHistory::find($request->prison_history_id);
        if(!$prisonHistory) {
            return response()->json([
                'message' => 'Prison History not found!',
            ], 422);
        }

        $prisonAppearance = new PrisonerApperance();
        $prisonAppearance->hair_type_id = $request->hair_type_id;
        $prisonAppearance->nose_id = $request->nose_id;
        $prisonAppearance->eye_id = $request->eye_id;
        $prisonAppearance->teeth_id = $request->teeth_id;
        $prisonAppearance->lip_id = $request->lip_id;
        $prisonAppearance->ear_id = $request->ear_id;
        $prisonAppearance->height = $request->height;
        $prisonAppearance->face = $request->face;
        $prisonAppearance->forehead = $request->forehead;
        $prisonAppearance->unique_appearance = $request->unique_appearance;
        $prisonAppearance->extra_description = $request->extra_description;
        $prisonAppearance->citizenship = $request->citizenship;
        $prisonAppearance->prision_history_id = $request->prison_history_id;
        $prisonAppearance->save();

        return response()->json([
            'message' => "Prisioner Apperance Added Successfully",
        ]);
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
                'Prisioner' => $Prisioner,
                'message' => 'Success'
            ]);
        }
        else{
            return response()->json([
                'status' => 422,
                'message' => 'Prisioner Not Found'
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
                'Prisioner' => $Prisioner,
                'message' => 'Success'
            ]);
        }
        else{
            return response()->json([
                'status' => 422,
                'message' => 'Prisioner status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
           'prisioner_unique_number' => 'required',
           'prision_unique_number' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'mother_name' => 'required',
            'sex' => 'required',
            'birth_district' => 'required',
            'birth_town_id' => 'required',
            'ethnic_group_id' => 'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validation->messages()
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
                'message' => 'Prisioner  Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Prisioner with this id not foud'
            ]);
        }
    }
}
