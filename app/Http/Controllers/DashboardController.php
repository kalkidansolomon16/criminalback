<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ear;
use App\Models\Prisioner;
use App\Models\User;
use App\Settings\Constants;
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

		return response()->json([
			'data' => $return,
		]);
	}
}
