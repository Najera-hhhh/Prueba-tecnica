<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    public function ciudades(){
        $this->belongsToMany(Ciudades::class);
    }

    public function estados(){
        $this->belongsToMany(Estados::class);
    }
}
