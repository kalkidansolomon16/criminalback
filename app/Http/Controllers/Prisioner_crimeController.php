<?php

namespace App\Http\Controllers;

use App\Models\Prisioner_crime;
use Illuminate\Http\Request;

class Prisioner_crimeController extends Controller {

    public function index() {

        $prisionerCrime = Prisioner_crime::with('crime')->get();
        if ($prisionerCrime->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Prisioner Crime not found'
            ]);
        }

        return response()->json([
            'data' => $prisionerCrime
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'prision_history_id' => 'required',
            'crime_id' => 'required',
            'crime_description' => 'required',
            'status' => 'required'
        ],
    [
            'prision_history_id.required' => 'የእስረኛ መረጃ ያስገቡ',
            'crime_id.required' => 'የወንጀል መረጃ ያስገቡ',
            'crime_description.required' => 'የወንጀል መግለጫ ያስገቡ',
            'status.required' => 'አሁን ያሉበት ሁኔታ ያስገቡ'
    ]);

        $prisionerCrime = new Prisioner_crime();
        $prisionerCrime->prision_history_id = $request->prision_history_id;
        $prisionerCrime->crime_id = $request->crime_id;
        $prisionerCrime->crime_description = $request->crime_description;
        $prisionerCrime->status = $request->status;
        $prisionerCrime->save();

        return response()->json([
            'message' => 'prisionerCrime Successfully Created',
        ], 201);
    }

    public function show(Prisioner_crime $prisionerCrime) {
        
        return response()->json([
            'data' => $prisionerCrime
        ]); 
    }

    public function update(Request $request, Prisioner_crime $prisionerCrime) {

        $request->validate([
    'prision_history_id' => 'required|exists:prison_histories,id',
    'crime_id' => 'required|exists:crimes,id',
    'crime_description' => 'required|string|max:1000',
    'status' => 'required|string|max:255',
        ],
    [
            'prision_history_id.required' => 'የእስረኛ መረጃ ያስገቡ',
            'crime_id.required' => 'የወንጀል መረጃ ያስገቡ',
            'crime_description.required' => 'የወንጀል መግለጫ ያስገቡ',
            'status.required' => 'አሁን ያሉበት ሁኔታ ያስገቡ'
    ]);

        $prisionerCrime->prision_history_id = $request->prision_history_id;
        $prisionerCrime->crime_id = $request->crime_id;
        $prisionerCrime->crime_description = $request->crime_description;
        $prisionerCrime->status = $request->status;
        $prisionerCrime->save();

        return response()->json([
            'message' => 'prisionerCrime Updated Successfully',
        ]);
    }

    public function destroy(Prisioner_crime $prisionerCrime) {
        $prisionerCrime->delete();
        return response()->json(['message' => 'prisionerCrime deleted successfully!']);
    }
}