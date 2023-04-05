<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    function domiciles(){
        return $this->hasMany(Domicile::class);
    }

    function domicile(){
        return $this->hasOne(Domicile::class)->latest('start_date');
    }

    function responses(){
        return $this->hasMany(Response::class);
    }
}
