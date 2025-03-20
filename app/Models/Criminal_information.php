<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criminal_information extends Model
{
    public function criminal(){
        return $this->belongsTo(Criminal::class);
    }
    public function hair_type(){
        return $this->belongsTo(HairType::class);
    }
}
