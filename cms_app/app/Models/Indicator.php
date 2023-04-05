<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    function dimension(){
        return $this->belongsTo(Dimension::class);
    }

    function questions(){
        return $this->hasMany(Question::class);
    }
}
