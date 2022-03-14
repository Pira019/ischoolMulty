<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->integer('CodePersonnel')->primary();
            $table->string('NomPersonnel', 50)->nullable();
            $table->string('PrenomPersonnel', 50)->nullable();
            $table->date('DateRecrutement')->nullable();
            $table->tinyInteger('Professeur')->nullable();
            $table->longText('adressePersonnel');
            $table->string('villePersonnel', 10)->nullable();
            $table->string('sexePersonnel', 10)->nullable();
            $table->string('Tel1Personnel', 50)->nullable();
            $table->string('Tel2Personnel', 50)->nullable();
            $table->string('emailPersonnel', 50)->nullable();
            $table->string('diplomeEleve', 10)->nullable();
            $table->date('DebutDExperience')->nullable();
            $table->string('dernierEmployeur', 10)->nullable();
            $table->string('groupeSanguin', 10)->nullable();
            $table->string('photoPersonnel', 50)->default('no_picture.jpg');
            $table->string('matriculePersonnel', 10)->nullable();
            $table->string('anneeScolaire', 10)->nullable();
            $table->integer('Idrole')->default(6);
            $table->boolean('estSupprimer')->default(0);
            $table->string('password', 16)->default('password');
            $table->boolean('membreDirection')->default(0);
            $table->string('Poste_occupé', 100)->nullable();
            $table->string('status', 10)->nullable();
            $table->boolean('dossierComplet')->default(0);
            $table->boolean('ContratLegalise')->default(0);
            $table->boolean('CV')->default(0);
            $table->boolean('CopiesDiplomesLegalise')->default(0);
            $table->boolean('AttestationExperienceLegalises')->default(0);
            $table->boolean('CINLegalisee')->default(0);
            $table->boolean('FicheEntropometrique')->default(0);
            $table->boolean('CertificatDaptitude')->default(0);
            $table->boolean('Photos')->default(0);
            $table->dateTime('dateNaissance', 3)->nullable();
            $table->string('domaineDeSpecialite', 250)->nullable();
            $table->tinyInteger('autorisationVacation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel');
    }
}