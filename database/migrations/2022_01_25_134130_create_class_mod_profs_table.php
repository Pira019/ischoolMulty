<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassModProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_mod_profs', function (Blueprint $table) {
            $table->id();

            $table->string('codeClasse');
            $table->integer('codeModule');
            $table->integer('codeProfesseur');
            $table->string('codeFiliere')->nullable();
            $table->double('dureeHeures');
            $table->integer('semestre')->nullable();
            $table->string('anneeScolaire')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('Coef')->nullable();
            $table->string('jour')->nullable();
            $table->string('seance')->nullable();
            $table->string('remarques')->nullable();
            $table->integer('nbControles')->nullable();
            $table->integer('Nb_heures')->nullable();
            $table->tinyInteger('note_unique')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_mod_profs');
    }
}
