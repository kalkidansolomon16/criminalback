<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrisionHistory;


class PrisionHistoryController extends Controller
{
    
    public function index() {
    
        $prisionHistory = PrisionHistory::with([
          
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
    
        return response()->json([
            'data' => $prisionHistory
        ]);
    }
    
    public function store(Request $request) {
    
        $request->validate([
            'prisioner_id' =>'required',
            'photo' => 'required',
            'prision_cell_id' => 'required',
            'criminal_type_id' => 'required',
            'current_city_id' => 'required',
            'educational_level_id' => 'required',
            'religion_id' => 'required',
            'closest_respondent' => 'required',
            'closest_respondent_town_id' => 'required',
            'current_district' => 'required',
            'closest_respondent_district' => 'required',
            'job' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'date_time_entered' => 'required',
            'end_date_of_arrest' => 'required',
            'date_of_release' => 'required',
            'release_reason' => 'required',
            'date_of_mercy_release' => 'required',
            'user_id' => 'required'
        ]);
    
        $prisionHistory = new PrisionHistory();
        $prisionHistory->prisioner_id = $request->prisioner_id;
        // $prisionHistory->photo = $request->photo;
        $prisionHistory->prision_cell_id = $request->prision_cell_id;
        $prisionHistory->criminal_type_id = $request->criminal_type_id;
        $prisionHistory->current_city_id = $request->current_city_id;
        $prisionHistory->educational_level_id = $request->educational_level_id;
        $prisionHistory->religion_id = $request->religion_id;
        $prisionHistory->closest_respondent = $request->closest_respondent;
        $prisionHistory->closest_respondent_town_id = $request->closest_respondent_town_id;
        $prisionHistory->current_district = $request->current_district;
        $prisionHistory->closest_respondent_district = $request->closest_respondent_district;
        $prisionHistory->job = $request->job;
        $prisionHistory->phone_number = $request->phone_number;
        $prisionHistory->mobile_number = $request->mobile_number;
        $prisionHistory->date_time_entered = $request->date_time_entered;
        $prisionHistory->end_date_of_arrest = $request->end_date_of_arrest;
        $prisionHistory->date_of_release = $request->date_of_release;
        $prisionHistory->release_reason = $request->release_reason;
        $prisionHistory->date_of_mercy_release = $request->date_of_mercy_release;
        $prisionHistory->user_id = $request->user_id;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $prisionHistory->photo = 'img/' . $photoName;
        }
        $prisionHistory->save();
    
        return response()->json([
            'data' =>$prisionHistory,
            'message' => 'PrisionHistory Successfully Created',
        ], 201);
    }
    
    public function show(string $id){
        $prisionHistory = PrisionHistory::with([
          
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
            'user',
            'prisonerCell'
        ])->find($id);
        return response()->json([
            'data' => $prisionHistory
        ]); 
    }
    
    public function update(Request $request, PrisionHistory $prisionHistory) {
    
        $request->validate([
            'prisioner_id' =>'required',
            'photo' => 'required',
            'prision_cell_id' => 'required',
            'criminal_type_id' => 'required',
            'current_city_id' => 'required',
            'educational_level_id' => 'required',
            'religion_id' => 'required',
            'closest_respondent' => 'required',
            'closest_respondent_town_id' => 'required',
            'current_district' => 'required',
            'closest_respondent_district' => 'required',
            'job' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'date_time_entered' => 'required',
            'end_date_of_arrest' => 'required',
            'date_of_release' => 'required',
            'release_reason' => 'required',
            'date_of_mercy_release' => 'required',
            'user_id' => 'required'
        ]);
    
        $prisionHistory->prisioner_id = $request->prisioner_id;
       // $prisionHistory->photo = $request->photo;
        $prisionHistory->prision_cell_id = $request->prision_cell_id;
        $prisionHistory->criminal_type_id = $request->criminal_type_id;
        $prisionHistory->current_city_id = $request->current_city_id;
        $prisionHistory->educational_level_id = $request->educational_level_id;
        $prisionHistory->religion_id = $request->religion_id;
        $prisionHistory->closest_respondent = $request->closest_respondent;
        $prisionHistory->closest_respondent_town_id = $request->closest_respondent_town_id;
        $prisionHistory->current_district = $request->current_district;
        $prisionHistory->closest_respondent_district = $request->closest_respondent_district;
        $prisionHistory->job = $request->job;
        $prisionHistory->phone_number = $request->phone_number;
        $prisionHistory->mobile_number = $request->mobile_number;
        $prisionHistory->date_time_entered = $request->date_time_entered;
        $prisionHistory->end_date_of_arrest = $request->end_date_of_arrest;
        $prisionHistory->date_of_release = $request->date_of_release;
        $prisionHistory->release_reason = $request->release_reason;
        $prisionHistory->date_of_mercy_release = $request->date_of_mercy_release;
        $prisionHistory->user_id = $request->user_id;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $prisionHistory->photo = 'img/' . $photoName;
        }
        $prisionHistory->save();
    
        return response()->json([
            'message' => 'PrisionHistory Updated Successfully',
        ]);
    }
    
    public function destroy(PrisionHistory $prisionHistory) {
        $prisionHistory->delete();
        return response()->json(['message' => 'PrisionHistory deleted successfully!']);
    }
    }

