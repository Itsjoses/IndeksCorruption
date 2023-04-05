<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    function province(){
        return $this->belongsTo(Province::class);
    }

    function domiciles(){
        return $this->hasMany(Domicile::class);
    }

    function responses(){
        return $this->hasMany(Response::class);
    }

    function participants(){
        return $this->hasManyThrough(Participant::class, Domicile::class, 'city_id', 'id', 'id', 'participant_id');
    }
}
