<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDocument extends Model
{
    use HasFactory;

    protected $table = "demande_documents";

    public function documents(){

        return $this->hasMany(Document::class,'id');
    }
}
