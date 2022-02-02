<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    public function class_mod_prof(){

        return $this->hasMany(class_mod_prof::class,'codeClasse');
    }
}