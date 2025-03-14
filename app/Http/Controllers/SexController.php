<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sex;
use Illuminate\Http\Request;

class SexController extends Controller
{
    public function index()
    {
        $genders = Sex::all(); // Fixed typo from $towm to $religion
        return response()->json([
            'message' => 'Success',
            'data' => $genders
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255', // Added validation for string and max length
        ]);

        $gender = Sex::create($fields);
        return response()->json($gender, 201); // Return the created gender with a 201 status
    }

    public function show(Sex $gender)
    {
        return response()->json($gender); // Return the gender as a JSON response
    }

    public function update(Request $request, Sex $gender)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $gender->update($fields);
        return response()->json($gender); // Return the updated gender
    }

    public function destroy(Sex $gender)
    {
        $gender->delete();
        return response()->json(['message' => 'gender deleted successfully!']); // Corrected message
    }
}