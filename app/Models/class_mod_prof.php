<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_mod_prof extends Model
{
    use HasFactory;

    protected $table ="class_mod_prof";
    protected $primaryKey = 'codeClasse';

    public function classe(){

        return $this->belongsTo(Classe::class,'code_classe');
    }
}
