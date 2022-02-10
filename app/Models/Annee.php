<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;



    public function abscences(){

        return $this->hasMany(Absences::class,'anneeScolaire');
    }
}