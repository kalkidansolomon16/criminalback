<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisioners_cashe extends Model
{
    public function prisonerHistory()
    {
        return $this->belongsTo(PrisionHistory::class, 'prision_history_id');
    }
}
