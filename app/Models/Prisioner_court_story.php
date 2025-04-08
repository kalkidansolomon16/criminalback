<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisioner_court_story extends Model
{
    public function court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
    public function updatedCourt(){
        return $this->belongsTo(Court::class, 'update_court_id');
    }
}
