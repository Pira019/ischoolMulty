<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassModProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_mod_prof', function (Blueprint $table) {
            $table->string('codeClasse', 10);
            $table->integer('codeModule');
            $table->integer('codeProfesseur');
            $table->string('codeFiliere', 10)->nullable();
            $table->double('dureeHeures');
            $table->integer('semestre')->nullable();
            $table->string('anneeScolaire', 10)->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('Coef')->default(1);
            $table->string('jour', 10)->nullable();
            $table->string('seance', 10)->nullable();
            $table->string('remarques', 50)->nullable();
            $table->integer('nbControles')->default(2);
            $table->integer('Nb_heures')->nullable();
            $table->tinyInteger('note_unique')->nullable();

            $table->primary(['codeClasse', 'codeModule', 'codeProfesseur']);
            $table->foreign('codeClasse', 'FK_Class_mod_prof_classe')->references('code_classe')->on('classe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_mod_prof');
    }
}