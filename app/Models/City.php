<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function criminal(){
        return $this->hasMany('criminal_id');
    }
}

