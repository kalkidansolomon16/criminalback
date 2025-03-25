<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller {

    public function index() {

        $cities = City::with('region')->get();

        return response()->json([
            'data' => $cities
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->region_id = $request->region_id;
        $city->save();

        return response()->json([
            'message' => 'City Successfully Created',
        ], 201);
    }

    public function show(City $city) {
        
        return response()->json([
            'data' => $city
        ]); 
    }

    public function update(Request $request, City $city) {

        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required',
        ]);

        $city->name = $request->name;
        $city->region_id = $request->region_id;
        $city->save();

        return response()->json([
            'message' => 'City Updated Successfully',
        ]);
    }

    public function destroy(City $city) {
        $city->delete();
        return response()->json(['message' => 'City deleted successfully!']);
    }
}