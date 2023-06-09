<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    function cities(){
        return $this->hasMany(City::class);
    }

    function domicilies(){
        return $this->hasManyThrough(Domicile::class, City::class);
    }
    
    function participants(){
        // return $this->hasManyThrough()
    }

}
