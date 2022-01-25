<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code_seance');
            $table->integer('code_etudiant');
            $table->dateTime('date_jour');
            $table->integer('professeur')->nullable();
            $table->string('code_filiere')->nullable();
            $table->string('code_classe')->nullable();
            $table->tinyInteger('Justifie')->nullable();
            $table->tinyInteger('retard')->nullable();
            $table->longText('remarques')->nullable();
            $table->string('mois')->nullable();
            $table->string('anneeScolaire')->nullable();
            $table->tinyInteger('AbscenceActive')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('semestre')->nullable();
            $table->double('nbr_heures')->nullable();
            $table->integer('code_module')->nullable();
            $table->tinyInteger('emailEnvoye')->nullable();
            $table->date('dateEnvoiEmail')->nullable();
            $table->tinyInteger('smsEnvoye')->nullable();
            $table->date('dateEnvoiSms')->nullable();
            $table->integer('groupe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
