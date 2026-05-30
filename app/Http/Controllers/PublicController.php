<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Settings\Constants;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function userRole(){
        $user = Auth::user();
        if($user){
            $roleId = $user->role_id;
            $roleName = [
                Constants::አስተዳዳሪ => 'አስተዳዳሪ',
                Constants::ፖሊስ => 'ፖሊስ',
                Constants::ጥበቃ => 'ጥበቃ',
                Constants::ሀኪም => 'ሀኪም',
            ];
            if(array_key_exists($roleId, $roleName)){
                return response()->json([
                    'data' => [
                        'id' => $roleId,
                        'name' => $roleName[$roleId]
                    ]
                ]);

            }
        }
        return response()->json(['data' => null],404);
    }
    public function getRoleName($roleId)
    {
        $roles = [
            Constants::አስተዳዳሪ => 'አስተዳዳሪ',
            Constants::ፖሊስ => 'ፖሊስ',
            Constants::ጥበቃ => 'ጥበቃ',
            Constants::ሀኪም => 'ሀኪም',
        ];
    
        return $roles[$roleId] ?? 'Unknown Role';
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
    public function criminal_status(){
        return response()->json(
            [
                ['id' => Constants::ተጠርጣሪ, 'name' => 'ተጠርጣሪ'],
                ['id' => Constants::ፍርደኛ, 'name' => 'ፍርደኛ'],
            ]
            );
    }
    public function verdict_status(){
        return response()->json(
            [
                ['id' => Constants::ቀጠሮ, 'name' => 'ቀጠሮ'],
                ['id' => Constants::የመጨረሻ_ዉሳኔ, 'name' => 'የመጨረሻ_ዉሳኔ'],
            ]
            );
    }
  
}
