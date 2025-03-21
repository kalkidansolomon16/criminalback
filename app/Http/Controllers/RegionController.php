<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    public function index()
    {
        $religions = Region::all(); // Fixed typo from $towm to $religion
        return response()->json([
            'message' => 'Success',
            'data' => $religions
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255', // Added validation for string and max length
        ]);

        $religion = Region::create($fields);
        return response()->json($religion, 201); // Return the created religion with a 201 status
    }

    public function show(Region $religion)
    {
        return response()->json($religion); // Return the religion as a JSON response
    }

    public function update(Request $request, Region $religion)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $religion->update($fields);
        return response()->json($religion); // Return the updated religion
    }

    public function destroy(Region $religion)
    {
        $religion->delete();
        return response()->json(['message' => 'religion deleted successfully!']); // Corrected message
    }
}
