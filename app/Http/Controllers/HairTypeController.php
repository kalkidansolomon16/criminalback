<?php

namespace App\Http\Controllers;

use App\Models\HairType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HairTypeController extends Controller{


    public function index() {

        $hairTypes = HairType::all();

        return response()->json([
            'data' => $hairTypes
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ],
        [
            'name.required' => 'ስም ያስገቡ', // Custom error message for name
        ]);

        $hair = new HairType();
        $hair->name = $request->name;
        $hair->save();

        return response()->json([
            'message' => 'hair Successfully Created',
        ], 201);
    }

    public function show(HairType $hair) {
        
        return response()->json([
            'data' => $hair
        ]); 
    }

    public function update(Request $request, HairType $hair) {

        $request->validate([
            'name' => 'required|string|max:255',
        ],
        [
            'name.required' => 'ስም ያስገቡ', // Custom error message for name
        ]);

        $hair->name = $request->name;
        $hair->save();

        return response()->json([
            'message' => 'hair Updated Successfully',
        ]);
    }

    public function destroy(HairType $hair) {
        $hair->delete();
        return response()->json(['message' => 'hair deleted successfully!']);
    }
}
