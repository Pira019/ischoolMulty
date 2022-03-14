<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    use HasFactory;


    protected $fillable = [
        'code_etudiant'
    ];

    protected $dates = ['date_jour'];


    protected $casts =[
        'date_jour' => 'date:d-m-Y'
    ];



    public function annee(){

        return $this->belongsTo(Annee::class,'annee_scolaire');

   }

}
