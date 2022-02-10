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
            $table->string('code_seance', 10);
            $table->integer('code_etudiant');
            $table->dateTime('date_jour', 3);
            $table->integer('professeur')->nullable();
            $table->string('code_filiere', 10)->nullable();
            $table->string('code_classe', 10)->nullable();
            $table->tinyInteger('Justifie')->nullable();
            $table->tinyInteger('retard')->nullable();
            $table->longText('remarques');
            $table->string('mois', 10)->nullable();
            $table->string('anneeScolaire', 10)->nullable();
            $table->boolean('AbscenceActive')->default(1);
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('semestre')->nullable();
            $table->double('nbr_heures')->default(2);
            $table->integer('code_module')->nullable();
            $table->boolean('emailEnvoye')->default(0);
            $table->date('dateEnvoiEmail')->nullable();
            $table->boolean('smsEnvoye')->default(0);
            $table->date('dateEnvoiSms')->nullable();
            $table->integer('groupe')->nullable();

            $table->timestamps();
            
            $table->primary(['code_seance', 'code_etudiant', 'date_jour']);
            $table->foreign('anneeScolaire', 'FK_absences_Annee')->references('annee_scolaire')->on('annee');
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
