<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ear;
use App\Models\Prisioner;
use App\Models\PrisionHistory;
use App\Models\Prisoner_attendance;
use App\Models\User;
use App\Settings\Constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller {
	public function index() {
		$return = [];

		$return['users'] = User::count();
		$return['admin'] = User::where('role', Constants::አስተዳዳሪ)->count();
		$return['police'] = User::where('role', Constants::ፖሊስ)->count();
		$return['guard'] = User::where('role', Constants::ጥበቃ)->count();
		$return['doctor'] = User::where('role', Constants::ሀኪም)->count();

		$return['prisoners'] = Prisioner::count();

		$return['male_prisoners'] = Prisioner::where('sex', Constants::ወንድ)->count();
		$return['female_prisoners'] = Prisioner::where('sex', Constants::ሴት)->count();


		$monthlyArrests = PrisionHistory::query()
			->selectRaw("DATE_FORMAT(date_time_entered, '%M %Y') as month, COUNT(*) as total_arrests")
			->groupByRaw("DATE_FORMAT(date_time_entered, '%M %Y')")
			->orderByRaw("MIN(date_time_entered) DESC")
			->get();
		
		$thisMonth = $monthlyArrests->pluck('month');
		$ret = [];
		foreach($thisMonth as $a) {
			if(is_null($a)) {
				$ret[] = '-';
			} else {
				$ret[] = $a;
			}
		}
		$return['monthly_arrests'] = [
			'keyss' => $ret,
			'valuess' => $monthlyArrests->pluck('total_arrests'),
		];

		$crimeCounts = DB::table('prisioner_crimes')
			->join('crimes', 'prisioner_crimes.crime_id', '=', 'crimes.id')
			->select('crimes.name', DB::raw('COUNT(*) as total'))
			->groupBy('crimes.name')
			->orderByDesc('total')
			->get();

		$return['crime_counts'] = [
			'keyss' => $crimeCounts->pluck('name'),
			'valuess' => $crimeCounts->pluck('total'),
		];

		$return['attendances'] = $this->calculateAttendance();

		return response()->json([
			'data' => $return,
		]);
	}

	public function calculateAttendance() {
		$attendances = Prisoner_attendance::query()
			->join('prisioners', 'prisoner_attendances.prisioner_id', '=', 'prisioners.id')
			->select([
				'prisoner_attendances.date',
				'prisioners.sex',
				DB::raw("SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as present_count"),
				DB::raw("SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as absent_count"),
			])
			->groupBy('prisoner_attendances.date', 'prisioners.sex')
			->orderBy('prisoner_attendances.date')
			->get();

		$dates = [];
		$malePresent = [];
		$maleAbsent = [];
		$maleTotal = [];

		$femalePresent = [];
		$femaleAbsent = [];
		$femaleTotal = [];

		foreach ($attendances as $row) {
			$date = $row->date;
			
			if (!in_array($date, $dates)) {
				$dates[] = $date;
			}

			$present = (int) $row->present_count;
			$absent = (int) $row->absent_count;
			$total = $present + $absent;

			if ($row->sex === Constants::ወንድ) {
				$malePresent[] = $present;
				$maleAbsent[] = $absent;
				$maleTotal[] = $total;
			} elseif ($row->sex === Constants::ሴት) {
				$femalePresent[] = $present;
				$femaleAbsent[] = $absent;
				$femaleTotal[] = $total;
			}
		}

		$result = [
			'male_info' => [
				[ 'name' => 'ወንድ', 'data' => $maleTotal ],
				[ 'name' => 'ወንድ የተገኘ', 'data' => $malePresent ],
				[ 'name' => 'ወንድ ያልተገኘ', 'data' => $maleAbsent ],
			],
			'female_info' => [
				[ 'name' => 'ሴት', 'data' => $femaleTotal ],
				[ 'name' => 'ሴት የተገኘ', 'data' => $femalePresent ],
				[ 'name' => 'ሴት ያልተገኘ', 'data' => $femaleAbsent ],
			],
			'dates' => $dates,
		];

		return $result;
	}
}
