<?php

namespace App\Http\Controllers;

use App\Settings\Constants;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function roles() {
        
        return response()->json(
            [
                [ 'id' => Constants::ADMIN , 'name' => 'Admin '],
                [ 'id' => Constants::POLICE , 'name' => 'Police '],
                [ 'id' => Constants::GUARD , 'name' => 'Guard '],
                [ 'id' => Constants::DOCTOR , 'name' => 'Doctor '],
            ]
        );
    }

    public function sexes() {
        
        return response()->json(
            [
                [ 'id' => Constants::MALE , 'name' => 'Male '],
                [ 'id' => Constants::FEMALE , 'name' => 'Female '],
            ]
        );
    }
}
