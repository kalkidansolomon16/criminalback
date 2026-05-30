<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller {

    public function index() {

        $towns = Town::with('city.region')->get();

        return response()->json([
            'data' => $towns
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required',
        ],
    [
        'name.required' => 'የከተማ ስም ያስገቡ',
        'city_id.required' => 'ከተማ ይምረጡ'
    ]);

        $town = new Town();
        $town->name = $request->name;
        $town->city_id = $request->city_id;
        $town->save();

        return response()->json([
            'message' => 'Town Successfully Created',
        ], 201);
    }

    public function show(Town $town) {
        
        return response()->json([
            'data' => $town
        ]); 
    }

    public function update(Request $request, Town $town) {

        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required',
        ],
    [
        'name.required' => 'የከተማ ስም ያስገቡ',
        'city_id.required' => 'ከተማ ይምረጡ'
    ]);

        $town->name = $request->name;
        $town->city_id = $request->city_id;
        $town->save();

        return response()->json([
            'message' => 'Town Updated Successfully',
        ]);
    }

    public function destroy(Town $town) {
        $town->delete();
        return response()->json(['message' => 'Town deleted successfully!']);
    }
}