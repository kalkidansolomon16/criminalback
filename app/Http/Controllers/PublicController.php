<?php

namespace App\Http\Controllers;

use App\Settings\Constants;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function roles() {
        
        return response()->json(
            [
                [ 'id' => Constants::አስተዳዳሪ , 'name' => 'አስተዳዳሪ '],
                [ 'id' => Constants::ፖሊስ , 'name' => 'ፖሊስ '],
                [ 'id' => Constants::ጥበቃ , 'name' => 'ጥበቃ '],
                [ 'id' => Constants::ሀኪም , 'name' => 'ሀኪም '],
            ]
        );
    }

    public function sexes() {
        
        return response()->json(
            [
                [ 'id' => Constants::ወንድ , 'name' => 'ወንድ '],
                [ 'id' => Constants::ሴት , 'name' => 'ሴት '],
            ]
        );
    }
    public function cashTypes(){
        return response()->json(
            [
                ['id' => Constants::ገቢ, 'name' => 'ገቢ'],
                ['id' => Constants::ወጪ, 'name' => 'ወጪ'],
            ]
            );
    }
}
