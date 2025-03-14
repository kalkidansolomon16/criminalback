<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EducationalLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EducationalLevelController extends Controller
{
    public function index()
    {
        $educations = EducationalLevel::all(); // Fixed typo from $towm to $education
        return response()->json([
            'message' => 'Success',
            'data' => $educations
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255', // Added validation for string and max length
        ]);

        $education = EducationalLevel::create($fields);
        return response()->json($education, 201); // Return the created education with a 201 status
    }

    public function show(EducationalLevel $education)
    {
        return response()->json($education); // Return the education as a JSON response
    }

    public function update(Request $request, EducationalLevel $education)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $education->update($fields);
        return response()->json($education); // Return the updated education
    }

    public function destroy(EducationalLevel $education)
    {
        $education->delete();
        return response()->json(['message' => 'education deleted successfully!']); // Corrected message
    }
}