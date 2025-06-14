<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prisoner_attendance;
use App\Http\Controllers\Controller;
use App\Models\Prisioner;
use App\Settings\Constants;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PrisonerAttendanceController extends Controller
{

    public function index() {
        $date = Carbon::parse(request('date')) ?? today();
        $time = request('time') ?? Constants::MORNING;

        $attendances = Prisioner::query()
            ->with(['prisonerAttendances' => function($query) use($date, $time) {
                $query->whereDate('date', $date)->where('status', $time);
            }])
            ->orderByDesc('id')
            ->paginate(10);


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
        ],
        [
            'time.required' => 'ሰዓት ያስገቡ',
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
            'message' => 'አቴንዳንስ ተመዝግቧል',
        ], 201);
    }

    public function show(Prisoner_attendance $attendance) {
        
        return response()->json([
            'data' => $attendance
        ]); 
    }

    public function update(Request $request, Prisoner_attendance $attendance) {

$request->validate([
    'status' => 'required|string|max:255',
    'date' => 'required|date',
    'time' => 'required|string|max:255',
    'prisoner_id' => 'required|exists:prisoners,id',
], [
    'status.required' => 'ሁኔታ ያስገቡ',
    'date.required' => 'ቀን ያስገቡ',
    'date.date' => 'ቀን ትክክለኛ ቀን መሆን አለበት',
    'time.required' => 'ሰዓት ያስገቡ',
    'prisoner_id.required' => 'የእስረኛ መረጃ ያስገቡ',
    'prisoner_id.exists' => 'የተመረጠው እስረኛ አልተገኘም',
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