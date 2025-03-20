<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    public function criminals()
    {
        return $this->hasMany(Criminal::class, 'sex_id');
    }
}
