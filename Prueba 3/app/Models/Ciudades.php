<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function estados(){
        return $this->belongsToMany(Estados::class);
    }

    public function user(){
        $this->belongsToMany(user::class);
    }


}
