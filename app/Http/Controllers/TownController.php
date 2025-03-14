<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index()
    {
        $towns = Town::all(); // Fixed typo from $towm to $towns
        return response()->json([
            'message' => 'Success',
            'data' => $towns
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255', // Added validation for string and max length
        ]);

        $town = Town::create($fields);
        return response()->json($town, 201); // Return the created town with a 201 status
    }

    public function show(Town $town)
    {
        return response()->json($town); // Return the town as a JSON response
    }

    public function update(Request $request, Town $town)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $town->update($fields);
        return response()->json($town); // Return the updated town
    }

    public function destroy(Town $town)
    {
        $town->delete();
        return response()->json(['message' => 'Town deleted successfully!']); // Corrected message
    }
}