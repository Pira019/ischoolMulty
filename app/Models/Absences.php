<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    use HasFactory;


    protected $fillable = [
        'code_etudiant'
    ];

    protected $casts =[
        'date_jour' => 'datetime:d-m-Y'
    ];


    public function annee(){

        return $this->belongsTo(Annee::class,'annee_scolaire');

   }

}