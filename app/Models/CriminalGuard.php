<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriminalGuard extends Model
{
    public function criminal(){
        return $this->belongsTo(Criminal::class,'criminal_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
