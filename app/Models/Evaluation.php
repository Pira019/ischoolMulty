<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluation';
    protected $guarded = [];


    public function filliere(){

        return $this->belongsTo(Filiere::class,'code_filiere');
    }

}