<?php

namespace App\Models\Models;

use App\Models\annee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absences extends Model
{
    use HasFactory;


    public function annee(){

        return $this->belongsTo(annee::class,'annee_scolaire');
    }

}