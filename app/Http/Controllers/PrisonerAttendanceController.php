<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrisonerAttendace;

class PrisonerAttendanceController extends Controller
{

    public function index() {

        $attendances = PrisonerAttendace::all();

        return response()->json([
            'data' => $attendances
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'status' => 'required|string|max:255',
            'date' => 'required/date',
            'time' => 'required',
            'prisoner_id' => 'required|exists:prisoners,id',

        ]);

        $attendance = new PrisonerAttendace();
        $attendance->status = $request->status;
        $attendance->date = $request->date;
        $attendance->time = $request->time;
        $attendance->prisoner_id = $request->prisoner_id;
        $attendance->save();

        return response()->json([
            'message' => 'attendance Successfully Created',
        ], 201);
    }

    public function show(PrisonerAttendace $attendance) {
        
        return response()->json([
            'data' => $attendance
        ]); 
    }

    public function update(Request $request, PrisonerAttendace $attendance) {

        $request->validate([
            'status' => 'required|string|max:255',
            'date' => 'required/date',
            'time' => 'required',
            'prisoner_id' => 'required|exists:prisoners,id',
        ]);

        $attendance->status = $request->status;
        $attendance->date = $request->date;
        $attendance->time = $request->time;
        $attendance->prisoner_id = $request->prisoner_id;
        $attendance->save();

        return response()->json([
            'message' => 'attendance Updated Successfully',
        ]);
    }

    public function destroy(PrisonerAttendace $attendance) {
        $attendance->delete();
        return response()->json(['message' => 'attendance deleted successfully!']);
    }
}