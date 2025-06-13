<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nose;
use Illuminate\Http\Request;

class NoseController extends Controller
{
    public function index() {

        $noses = Nose::all();

        return response()->json([
            'data' => $noses
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ],
    [
            'name.required' => 'አፍንጫ ያስገቡ', // Custom error message for name
        ]);

        $nose = new Nose();
        $nose->name = $request->name;
        $nose->save();

        return response()->json([
            'message' => 'nose Successfully Created',
        ], 201);
    }

    public function show(Nose $nose) {
        
        return response()->json([
            'data' => $nose
        ]); 
    }

    public function update(Request $request, Nose $nose) {

        $request->validate([
            'name' => 'required|string|max:255',
        ],
    [
            'name.required' => 'አፍንጫ ያስገቡ', // Custom error message for name
        ]);

        $nose->name = $request->name;
        $nose->save();

        return response()->json([
            'message' => 'nose Updated Successfully',
        ]);
    }

    public function destroy(Nose $nose) {
        $nose->delete();
        return response()->json(['message' => 'nose deleted successfully!']);
    }
}
// try
