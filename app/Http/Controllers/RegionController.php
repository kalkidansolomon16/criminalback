<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller {

    public function index() {

        $regions = Region::all();

        return response()->json([
            'data' => $regions
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region = new Region();
        $region->name = $request->name;
        $region->save();

        return response()->json([
            'message' => 'Region Successfully Created',
        ], 201);
    }

    public function show(Region $region) {
        
        return response()->json([
            'data' => $region
        ]); 
    }

    public function update(Request $request, Region $region) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region->name = $request->name;
        $region->save();

        return response()->json([
            'message' => 'Region Updated Successfully',
        ]);
    }

    public function destroy(Region $region) {
        $region->delete();
        return response()->json(['message' => 'Region deleted successfully!']);
    }
}