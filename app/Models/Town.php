<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function criminal(){
        return $this->hasMany('criminal_id');
    }

}
