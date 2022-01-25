<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();

            $table->integer('CodePersonnel');
            $table->string('NomPersonnel')->nullable();
            $table->string('PrenomPersonnel')->nullable();
            $table->date('DateRecrutement')->nullable();
            $table->tinyInteger('Professeur')->nullable();
            $table->longText('adressePersonnel')->nullable();
            $table->string('villePersonnel')->nullable();
            $table->string('sexePersonnel')->nullable();
            $table->string('Tel1Personnel')->nullable();
            $table->string('Tel2Personnel')->nullable();
            $table->string('emailPersonnel')->nullable();
            $table->string('diplomeEleve')->nullable();
            $table->date('DebutDExperience')->nullable();
            $table->string('dernierEmployeur')->nullable();
            $table->string('groupeSanguin')->nullable();
            $table->string('photoPersonnel')->nullable();
            $table->string('matriculePersonnel')->nullable();
            $table->string('anneeScolaire')->nullable();
            $table->integer('Idrole')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('membreDirection')->nullable();
            $table->string('Poste_occupé')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('dossierComplet')->nullable();
            $table->tinyInteger('ContratLegalise')->nullable();
            $table->tinyInteger('CV')->nullable();
            $table->tinyInteger('CopiesDiplomesLegalise')->nullable();
            $table->tinyInteger('AttestationExperienceLegalises')->nullable();
            $table->tinyInteger('CINLegalisee')->nullable();
            $table->tinyInteger('FicheEntropometrique')->nullable();
            $table->tinyInteger('CertificatDaptitude')->nullable();
            $table->tinyInteger('Photos')->nullable();
            $table->dateTime('dateNaissance')->nullable();
            $table->string('domaineDeSpecialite')->nullable();
            $table->tinyInteger('autorisationVacation')->nullable();
            
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
        Schema::dropIfExists('personnels');
    }
}
