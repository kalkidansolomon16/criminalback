<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PrisonerApperance extends Model
{
    public function hair(){
        return $this->belongsTo(HairType::class,'hair_type_id');
    }
    public function eye(){
        return $this->belongsTo(Eye::class);
    }
    public function teeth(){
        return $this->belongsTo(Teeth::class);
    }
    public function lip(){
        return $this->belongsTo(Lip::class);
    }
    public function ear(){
        return $this->belongsTo(Ear::class);
    }
    public function nose(){
        return $this->belongsTo(Nose::class);
    }

}
