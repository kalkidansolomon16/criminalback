<?php

namespace App\Http\Controllers;

use App\Models\DiseaseType;
use Illuminate\Http\Request;

class DiseaseTypeController extends Controller {

    public function index() {

        $diseaseTypes = DiseaseType::all();

        return response()->json([
            'data' => $diseaseTypes
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $diseaseType = new DiseaseType();
        $diseaseType->name = $request->name;
        $diseaseType->save();

        return response()->json([
            'message' => 'Disease Type Successfully Created',
        ], 201);
    }

    public function show(DiseaseType $diseaseType) {
        
        return response()->json([
            'data' => $diseaseType
        ]); 
    }

    public function update(Request $request, DiseaseType $diseaseType) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $diseaseType->name = $request->name;
        $diseaseType->save();

        return response()->json([
            'message' => 'Disease Type Updated Successfully',
        ]);
    }

    public function destroy(DiseaseType $diseaseType) {
        $diseaseType->delete();
        return response()->json(['message' => 'Disease Type deleted successfully!']);
    }
}