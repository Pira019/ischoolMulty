<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeEtudiantClass extends Model
{
    use HasFactory;


    protected $table ="anneeClasses";
    public $timestamps= false;
    protected $fillable = [
        'code_etudiant','code_classe','annee_scolaire'
    ];

}
