<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EthnicGroup;
use Illuminate\Http\Request;

class EthnicGroupController extends Controller
{
    public function index()
    {
        $ethnicgroups = EthnicGroup::all(); // Fixed typo from $towm to $religion
        return response()->json([
            'message' => 'Success',
            'data' => $ethnicgroups
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255', // Added validation for string and max length
        ]);

        $ethnicgroup = EthnicGroup::create($fields);
        return response()->json($ethnicgroup, 201); // Return the created ethnicgroup with a 201 status
    }

    public function show(EthnicGroup $ethnicgroup)
    {
        return response()->json($ethnicgroup); // Return the ethnicgroup as a JSON response
    }

    public function update(Request $request, EthnicGroup $ethnicgroup)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ethnicgroup->update($fields);
        return response()->json($ethnicgroup); // Return the updated ethnicgroup
    }

    public function destroy(EthnicGroup $ethnicgroup)
    {
        $ethnicgroup->delete();
        return response()->json(['message' => 'ethnicgroup deleted successfully!']); // Corrected message
    }
}