<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisioner_crime extends Model
{
    public function crime(){
        return $this->belongsTo(Crime::class,'crime_id');
    }
}
