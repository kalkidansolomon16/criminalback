<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisioner_property extends Model
{
    public function type(){
        return $this->belongsTo(Type::class,'type_id');
    }
}
