<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];


    public function estados(){
        return $this->belongsToMany(Ciudades::class);
    }

}
