<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annee extends Model
{
    use HasFactory;



    public function abscences(){

        return $this->hasMany(abscences::class,'anneeScolaire');
    }
}