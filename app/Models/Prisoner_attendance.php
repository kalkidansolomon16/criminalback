<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisoner_attendance extends Model
{
     protected $fillable = [
        'date',
        'status',
        'time',
        'prisioner_id', 
    ];
}
