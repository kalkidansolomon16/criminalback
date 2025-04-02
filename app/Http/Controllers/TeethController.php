<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teeth;
use Illuminate\Support\Facades\Validator;

     
    class TeethController extends Controller{
            
            
    public function index() {

        $teeths = Teeth::all();

        return response()->json([
            'data' => $teeths
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $teeth = new Teeth();
        $teeth->name = $request->name;
        $teeth->save();

        return response()->json([
            'message' => 'teeth Successfully Created',
        ], 201);
    }

    public function show(Teeth $teeth) {
        
        return response()->json([
            'data' => $teeth
        ]); 
    }

    public function update(Request $request, Teeth $teeth) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $teeth->name = $request->name;
        $teeth->save();

        return response()->json([
            'message' => 'teeth Updated Successfully',
        ]);
    }

    public function destroy(Teeth $teeth) {
        $teeth->delete();
        return response()->json(['message' => 'teeth deleted successfully!']);
    }
}

