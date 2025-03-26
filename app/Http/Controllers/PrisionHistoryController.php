<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrisionHistory;


class PrisionHistoryController extends Controller
{
    
    public function index() {
    
        $prisionHistory = PrisionHistory::all();
    
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
        $prisionHistory->photo = $request->photo;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->name = $request->name;
        $prisionHistory->save();
    
        return response()->json([
            'message' => 'PrisionHistory Successfully Created',
        ], 201);
    }
    
    public function show(PrisionHistory $prisionHistory) {
        
        return response()->json([
            'data' => $prisionHistory
        ]); 
    }
    
    public function update(Request $request, PrisionHistory $prisionHistory) {
    
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $prisionHistory->name = $request->name;
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

