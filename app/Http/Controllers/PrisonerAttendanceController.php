<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prisoner_attendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PrisonerAttendanceController extends Controller
{

    public function index() {

        $attendances = Prisoner_attendance::all();

        return response()->json([
            'data' => $attendances
        ]);
    }
public function store(Request $request) {
    foreach ($request->all() as $record) {
        $validation = Validator::make($record, [
            'date' => 'required',
            'status' => 'required',
            'time' => 'required',
            'prisioner_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }

        Prisoner_attendance::create([
            'date' => $record['date'],
            'status' => $record['status'],
            'time' => $record['time'],
            'prisioner_id' => $record['prisioner_id'],
        ]);
    }

    return response()->json([
        'message' => 'Attendance successfully created for all records.',
    ], 201);
}

    public function show(Prisoner_attendance $attendance) {
        
        return response()->json([
            'data' => $attendance
        ]); 
    }

    public function update(Request $request, Prisoner_attendance $attendance) {

        $request->validate([
            'status' => 'required',
            'date' => 'required/date',
            'time' => 'required',
            'prisioner_id' => 'required',
        ]);

        $attendance->status = $request->status;
        $attendance->date = $request->date;
        $attendance->time = $request->time;
        $attendance->prisioner_id = $request->prisioner_id;
        $attendance->save();

        return response()->json([
            'message' => 'attendance Updated Successfully',
        ]);
    }

    public function destroy(Prisoner_attendance $attendance) {
        $attendance->delete();
        return response()->json(['message' => 'attendance deleted successfully!']);
    }
}