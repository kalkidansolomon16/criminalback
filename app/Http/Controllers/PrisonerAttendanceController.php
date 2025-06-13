<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prisoner_attendance;
use App\Http\Controllers\Controller;
use App\Models\Prisioner;
use App\Settings\Constants;
use Illuminate\Support\Facades\Validator;

class PrisonerAttendanceController extends Controller
{

    public function index() {

        $attendances = Prisoner_attendance::all();

        return response()->json([
            'data' => $attendances
        ]);
    }

    public function prisonersForAttendance() {

        $date = today();
        $time = request('time') ?? Constants::MORNING;

        $present = Prisoner_attendance::whereDate('date', $date)->where('time', $time)->where('status', Constants::PRESENT)->select('prisioner_id')->get()->pluck('prisioner_id');
        $absent = Prisoner_attendance::whereDate('date', $date)->where('time', $time)->where('status', Constants::ABSENT)->select('prisioner_id')->get()->pluck('prisioner_id');

        return response()->json([
            'data' => [
                'present' => $present,
                'absent' => $absent,
                'today' => today()->format('d-m-Y'),
            ]
        ]);
    }
    
    
    public function store(Request $request) {
        $validation = Validator::make($request->all(), [
            'time' => 'required',
        ]);

        request('date', today());

        if ($validation->fails()) {
            return response()->json([
                'message' => $validation->messages()->first()
            ], 422);
        }

        foreach (request('present') ?? [] as $present) {
            Prisoner_attendance::create([
                'date' => today(),
                'status' => Constants::PRESENT,
                'time' => $request['time'],
                'prisioner_id' => $present,
            ]);
        }

        foreach (request('absent') ?? [] as $absent) {
            Prisoner_attendance::create([
                'date' => today(),
                'status' => Constants::ABSENT,
                'time' => $request['time'],
                'prisioner_id' => $absent,
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