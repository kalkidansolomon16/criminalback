<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function index()
    {
        $religions = Religion::all(); // Fixed typo from $towm to $religion
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

        $religion = Religion::create($fields);
        return response()->json($religion, 201); // Return the created religion with a 201 status
    }

    public function show(Religion $religion)
    {
        return response()->json($religion); // Return the religion as a JSON response
    }

    public function update(Request $request, Religion $religion)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $religion->update($fields);
        return response()->json($religion); // Return the updated religion
    }

    public function destroy(Religion $religion)
    {
        $religion->delete();
        return response()->json(['message' => 'religion deleted successfully!']); // Corrected message
    }
}