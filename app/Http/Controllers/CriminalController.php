<?php

namespace App\Http\Controllers;

use App\Models\Criminal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criminal = Criminal::all();
        if($criminal){
            return response()->json([
                'Criminal'=>$criminal,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Criminal not found'
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
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'mother_name'=>'required',
            'Sex'=>'required',
            'birth_place'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'city_id'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'educational_level_id'=>'required',
            'job'=>'required',
            'state_id'=>'required',
            'photo'=>'required',
            'Closest_respondent'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'city_id'=>'required',
            'Closest_respondent_district'=>'required',
            'phone'=>'required',
            'user_id'=>'required',
            'crime_description'=>'required',
            'criminal_type_id'=>'required',
            'crime_type_id'=>'required',
            'arrest_court'=>'required',
            'date_enterd'=>'required',
            'court_id'=>'required',
            'verdict_date'=>'required',
            'appointment_date'=>'required',
            'prisoner'=>'required',
            'updated_verdict'=>'required',
            'court_id'=>'required',
            'start_dateof_arrest'=>'required',
            'end_dateof_arrest'=>'required',
            'date_of_release'=>'required',
            'release_reason'=>'required',
            'dateof_mercy_release'=>'required'
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $criminal = Criminal::new();
            $criminal->first_name = request('first_name');
            $criminal->middle_name = request('middle_name');
            $criminal->last_name = request('last_name');
            $criminal->date_of_birth = request('date_of_birth');
            $criminal->mother_name = request('mother_name');
            $criminal->Sex = request('Sex');
            $criminal->birth_place = request('birth_place');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->city_id = request('city_id');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->educational_level_id = request('educational_level_id');
            $criminal->job = request('job');
            $criminal->state_id = request('state_id');
            $criminal->religion_id = request('religion_id');
            $criminal->photo = request('photo');
            $criminal->Closest_respondent = request('Closest_respondent');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->city_id = request('city_id');
            $criminal->Closest_respondent_district = request('Closest_respondent_district');
            $criminal->phone = request('phone');
            $criminal->user_id = request('user_id');
            $criminal->crime_description = request('crime_description');
            $criminal->criminal_type_id = request('criminal_type_id');
            $criminal->crime_type_id = request('crime_type_id');
            $criminal->arrest_court = request('arrest_court');
            $criminal->date_enterd = request('date_enterd');
            $criminal->court_id = request('court_id');
            $criminal->verdict_date = request('verdict_date');
            $criminal->prisoner = request('prisoner');
            $criminal->updated_verdict = request('updated_verdict');
            $criminal->court_id = request('court_id');
            $criminal->start_dateof_arrest = request('start_dateof_arrest');
            $criminal->end_dateof_arrest = request('end_dateof_arrest');
            $criminal->date_of_release = request('date_of_release');
            $criminal->release_reason = request('release_reason');
            $criminal->dateof_mercy_release = request('dateof_mercy_release');
            $criminal->writ = request('writ');
            $criminal->status = request('status');
            
            $criminal->save();
            return response()->json([
                'message'=>"criminalal Level added Successfully"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $criminal = Criminal::find($id);
        if($criminal){
            return response()->json([
                'Criminal'=>$criminal,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'criminalal Level Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $criminal = Criminal::find($id);
        if($criminal){
            return response()->json([
                'Criminal'=>$criminal,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'criminalal status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'mother_name'=>'required',
            'Sex'=>'required',
            'birth_place'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'city_id'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'educational_level_id'=>'required',
            'job'=>'required',
            'state_id'=>'required',
            'photo'=>'required',
            'Closest_respondent'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'city_id'=>'required',
            'Closest_respondent_district'=>'required',
            'phone'=>'required',
            'user_id'=>'required',
            'crime_description'=>'required',
            'criminal_type_id'=>'required',
            'crime_type_id'=>'required',
            'arrest_court'=>'required',
            'date_enterd'=>'required',
            'court_id'=>'required',
            'verdict_date'=>'required',
            'appointment_date'=>'required',
            'prisoner'=>'required',
            'updated_verdict'=>'required',
            'court_id'=>'required',
            'start_dateof_arrest'=>'required',
            'end_dateof_arrest'=>'required',
            'date_of_release'=>'required',
            'release_reason'=>'required',
            'dateof_mercy_release'=>'required'
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }

        else{
            $criminal = new Criminal();
            $criminal->first_name = request('first_name');
            $criminal->middle_name = request('middle_name');
            $criminal->last_name = request('last_name');
            $criminal->date_of_birth = request('date_of_birth');
            $criminal->mother_name = request('mother_name');
            $criminal->Sex = request('Sex');
            $criminal->birth_place = request('birth_place');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->city_id = request('city_id');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->educational_level_id = request('educational_level_id');
            $criminal->job = request('job');
            $criminal->state_id = request('state_id');
            $criminal->religion_id = request('religion_id');
            $criminal->photo = request('photo');
            $criminal->Closest_respondent = request('Closest_respondent');
            $criminal->region_id = request('region_id');
            $criminal->town_id = request('town_id');
            $criminal->city_id = request('city_id');
            $criminal->Closest_respondent_district = request('Closest_respondent_district');
            $criminal->phone = request('phone');
            $criminal->user_id = request('user_id');
            $criminal->crime_description = request('crime_description');
            $criminal->criminal_type_id = request('criminal_type_id');
            $criminal->crime_type_id = request('crime_type_id');
            $criminal->arrest_court = request('arrest_court');
            $criminal->date_enterd = request('date_enterd');
            $criminal->court_id = request('court_id');
            $criminal->verdict_date = request('verdict_date');
            $criminal->prisoner = request('prisoner');
            $criminal->updated_verdict = request('updated_verdict');
            $criminal->court_id = request('court_id');
            $criminal->start_dateof_arrest = request('start_dateof_arrest');
            $criminal->end_dateof_arrest = request('end_dateof_arrest');
            $criminal->date_of_release = request('date_of_release');
            $criminal->release_reason = request('release_reason');
            $criminal->dateof_mercy_release = request('dateof_mercy_release');
            $criminal->writ = request('writ');
            $criminal->status = request('status');
            $criminal->update();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $criminal = Criminal::find($id);
        if($criminal){
            $criminal->delete();
            return response()->json([
                'message'=>'criminalal Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'criminalal level with this id not foud'
            ]);
        }
    }
}
