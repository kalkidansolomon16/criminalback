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
            'criminal_unique_number'=>'required',
            'prison_unique_number'=>'required',
            'criminalSell_unique_number'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'mother_name'=>'required',
            'sex_id'=>'required',
            'birth_region_id'=>'required',
            'birth_town_id'=>'required',
            'birth_city_id'=>'required',
            'birth_district'=>'required',
            'current_region_id'=>'required',
            'current_town_id'=>'required',
            'current_city_id'=>'required',
            'current_district'=>'required',
            'educational_level_id'=>'required',
            'job'=>'required',
            'ethnic_group_id'=>'required',
            'religion_id'=>'required',
            'Closest_respondent'=>'required',
            'Closest_respondent_region_id'=>'required',
            'Closest_respondent_town_id'=>'required',
            'Closest_respondent_city_id'=>'required',
            'Closest_respondent_district'=>'required',
            'phone_number'=>'required',
            'mobile_number'=>'required',
            'user_id'=>'required',
            'registral_signature'=>'required',
            'crime_id'=>'required',
            'crime_description'=>'required',
            'criminal_type_id'=>'required',
            'arrest_court_id'=>'required',
            'date_enterd'=>'required',
            'time_enterd'=>'required',
            'verdict_date'=>'required',
            // 'court_id'=>'required',
            'appointment_date'=>'required',
            'prisoner'=>'required',
            'updated_verdict'=>'required',
            'verdict_court_id'=>'required',
            'updated_verdict_court_id'=>'required',
            // 'court_id'=>'required',
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
            $criminal->criminal_unique_number = request('criminal_unique_number');
            $criminal->prison_unique_number = request('prison_unique_number');
            $criminal->criminalSell_unique_number = request('criminalSell_unique_number');
            $criminal->first_name = request('first_name');
            $criminal->middle_name = request('middle_name');
            $criminal->last_name = request('last_name');
            $criminal->date_of_birth = request('date_of_birth');
            $criminal->mother_name = request('mother_name');
            $criminal->sex_id = request('sex_id');
            // $criminal->birth_place = request('birth_place');
            $criminal->birth_region_id = request('birth_region_id');
            $criminal->birth_town_id = request('birth_town_id');
            $criminal->birth_city_id = request('birth_city_id');
            $criminal->birth_district = request('birth_district');
            $criminal->current_region_id = request('current_region_id');
            $criminal->current_town_id = request('current_town_id');
            $criminal->current_city_id = request('current_city_id');
            $criminal->current_district = request('current_district');
            $criminal->educational_level_id = request('educational_level_id');
            $criminal->job = request('job');
            $criminal->ethnic_group_id = request('ethnic_group_id');
            // $criminal->religion_id = request('religion_id');
            $criminal->religion_id = request('religion_id');
            $criminal->Closest_respondent = request('Closest_respondent');
            $criminal->Closest_respondent_region_id = request('Closest_respondent_region_id');
            $criminal->Closest_respondent_town_id = request('Closest_respondent_town_id');
            $criminal->Closest_respondent_city_id = request('Closest_respondent_city_id');
            $criminal->Closest_respondent_district = request('Closest_respondent_district');
            $criminal->phone_number = request('phone_number');
            $criminal->mobile_number = request('mobile_number');
            $criminal->user_id = request('user_id');
            // $criminal->registral_signature = request('registral_signature');
            $criminal->crime_id = request('crime_id');
            $criminal->crime_description = request('crime_description');
            $criminal->criminal_type_id = request('criminal_type_id');
            $criminal->arrest_court_id = request('arrest_court_id');
            $criminal->date_enterd = request('date_enterd');
            $criminal->time_enterd = request('time_enterd');
            // $criminal->court_id = request('court_id');
            $criminal->verdict_date = request('verdict_date');
            $criminal->appointment_date = request('appointment_date');
            $criminal->prisoner = request('prisoner');
            $criminal->updated_verdict = request('updated_verdict');
            $criminal->verdict_court_id = request('verdict_court_id');
            $criminal->updated_verdict_court_id = request('updated_verdict_court_id');
            // $criminal->court_id = request('court_id');
            $criminal->start_dateof_arrest = request('start_dateof_arrest');
            $criminal->end_dateof_arrest = request('end_dateof_arrest');
            $criminal->date_of_release = request('date_of_release');
            $criminal->release_reason = request('release_reason');
            $criminal->dateof_mercy_release = request('dateof_mercy_release');
            // $criminal->writ = request('writ');
            // $criminal->status = request('status');
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $criminal->photo = $photoPath;
            }
    
            // Handle registral signature upload
            if ($request->hasFile('registral_signature')) {
                $registralSignaturePath = $request->file('registral_signature')->store('signatures', 'public');
                $criminal->registral_signature = $registralSignaturePath;
            }
    
            // Handle additional file uploads
            if ($request->hasFile('writ')) {
                $additionalFile1Path = $request->file('writ')->store('uploads', 'public');
                $criminal->writ = $additionalFile1Path; // Ensure your model has this field
            }
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
            'criminal_unique_number'=>'required',
            'prison_unique_number'=>'required',
            'criminalSell_unique_number'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'mother_name'=>'required',
            'sex_id'=>'required',
            'district'=>'required',
            'region_id'=>'required',
            'town_id'=>'required',
            'city_id'=>'required',
            'region_id_2'=>'required',
            'town_id_2'=>'required',
            'city_id_2'=>'required',
            'currentdistrict'=>'required',
            'educational_level_id'=>'required',
            'job'=>'required',
            'ethnic_group_id'=>'required',
            'photo'=>'required',
            'Closest_respondent'=>'required',
            'region_id_3'=>'required',
            'region_id_3'=>'required',
            'city_id_3'=>'required',
            'Closest_respondent_district'=>'required',
            'phone_number'=>'required',
            'mobile_number'=>'required',
            'user_id'=>'required',
            'registral_signature'=>'required',
            'crime_description'=>'required',
            'criminal_type_id'=>'required',
            'crime_type_id'=>'required',
            'arrest_court'=>'required',
            'date_enterd'=>'required',
            'time_enterd'=>'required',
            'verdict_court'=>'required',
            // 'court_id'=>'required',
            'verdict_date'=>'required',
            'appointment_date'=>'required',
            'prisoner'=>'required',
            'updated_verdict'=>'required',
            'updated_verdict_court'=>'required',
            // 'court_id'=>'required',
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
            $criminal->criminal_unique_number = request('criminal_unique_number');
            $criminal->prison_unique_number = request('prison_unique_number');
            $criminal->criminalSell_unique_number = request('criminalSell_unique_number');
            $criminal->first_name = request('first_name');
            $criminal->middle_name = request('middle_name');
            $criminal->last_name = request('last_name');
            $criminal->date_of_birth = request('date_of_birth');
            $criminal->mother_name = request('mother_name');
            $criminal->sex_id = request('sex_id');
            // $criminal->birth_place = request('birth_place');
            $criminal->region_id_1 = request('region_id_1');
            $criminal->town_id_1 = request('town_id_1');
            $criminal->city_id_1 = request('city_id_1');
            $criminal->district = request('district');
            $criminal->region_id_2 = request('region_id_2');
            $criminal->town_id_2 = request('town_id_2');
            $criminal->city_id_2 = request('city_id_2');
            $criminal->currentdistrict = request('currentdistrict');
            $criminal->educational_level_id = request('educational_level_id');
            $criminal->job = request('job');
            $criminal->ethnic_group_id = request('ethnic_group_id');
            $criminal->religion_id = request('religion_id');
            $criminal->photo = request('photo');
            $criminal->Closest_respondent = request('Closest_respondent');
            $criminal->region_id_3 = request('region_id_3');
            $criminal->town_id_3 = request('town_id_3');
            $criminal->city_id_3 = request('city_id_3');
            $criminal->Closest_respondent_district = request('Closest_respondent_district');
            $criminal->phone_number = request('phone_number');
            $criminal->mobile_number = request('mobile_number');
            $criminal->user_id = request('user_id');
            // $criminal->registral_signature = request('registral_signature');
            $criminal->crime_description = request('crime_description');
            $criminal->criminal_type_id = request('criminal_type_id');
            $criminal->crime_type_id = request('crime_type_id');
            $criminal->arrest_court = request('arrest_court');
            $criminal->date_enterd = request('date_enterd');
            $criminal->time_enterd = request('time_enterd');
            // $criminal->court_id = request('court_id');
            $criminal->verdict_date = request('verdict_date');
            $criminal->appointment_date = request('appointment_date');
            $criminal->prisoner = request('prisoner');
            $criminal->updated_verdict = request('updated_verdict');
            $criminal->verdict_court = request('verdict_court');
            $criminal->updated_verdict_court = request('updated_verdict_court');
            // $criminal->court_id = request('court_id');
            $criminal->start_dateof_arrest = request('start_dateof_arrest');
            $criminal->end_dateof_arrest = request('end_dateof_arrest');
            $criminal->date_of_release = request('date_of_release');
            $criminal->release_reason = request('release_reason');
            $criminal->dateof_mercy_release = request('dateof_mercy_release');
            $criminal->writ = request('writ');
            // $criminal->status = request('status');
            
            $criminal->update();
            return response()->json([
                'message'=>"criminalal Level added Successfully"
            ]);
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
