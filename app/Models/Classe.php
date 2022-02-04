<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table ="classe";
    protected $primaryKey="code_classe";

    public function class_mod_profs(){

        return $this->hasMany(class_mod_prof::class,'codeClasse');
    }
}