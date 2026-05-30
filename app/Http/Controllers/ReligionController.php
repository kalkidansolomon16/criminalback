<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller {

    public function index() {

        $religions = Religion::all();

        return response()->json([
            'data' => $religions
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ],
    [
            'name.required' => 'የሃይማኖት ስም ያስገቡ',
            'code.required' => 'ኮድ ያስገቡ',
    ]);

        $religion = new Religion();
        $religion->name = $request->name;
        $religion->code = $request->code;
        $religion->save();

        return response()->json([
            'message' => 'Religion Successfully Created',
        ], 201);
    }

    public function show(Religion $religion) {
        
        return response()->json([
            'data' => $religion
        ]); 
    }

    public function update(Request $request, Religion $religion) {

        $request->validate([
            'name' => 'required|string|max:255',
        ],
    [
            'name.required' => 'የሃይማኖት ስም ያስገቡ',
    ]);

        $religion->name = $request->name;
        $religion->code = $request->code;
        $religion->save();

        return response()->json([
            'message' => 'Religion Updated Successfully',
        ]);
    }

    public function destroy(Religion $religion) {
        $religion->delete();
        return response()->json(['message' => 'Religion deleted successfully!']);
    }
}