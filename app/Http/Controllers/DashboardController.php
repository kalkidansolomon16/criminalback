<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ear;
use App\Models\Prisioner;
use App\Models\PrisionHistory;
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
		
		$return['monthly_arrests'] = [
			'keyss' => $monthlyArrests->pluck('month'),
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

		return response()->json([
			'data' => $return,
		]);
	}
}
