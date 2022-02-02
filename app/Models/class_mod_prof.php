<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_mod_prof extends Model
{
    use HasFactory;


    public function classe(){

        return $this->belongsTo(Classe::class,'code_classe');
    }
}