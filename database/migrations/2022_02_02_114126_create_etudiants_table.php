<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {


            $table->increments('code_etudiant')->from(1000);
            $table->string('Nom_etudiant')->nullable();
            $table->string('prenom_etudiant')->nullable();
            $table->string('Nom_pere')->nullable();
            $table->string('Nom_mere')->nullable();
            $table->string('Adresse_permanante')->nullable();
            $table->string('Adresse_actuelle')->nullable();
            $table->string('Nationalité')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Sexe')->nullable();
            $table->dateTime('Date_naissance', 3)->nullable();
            $table->string('Telephone_personnel')->nullable();
            $table->string('Telephone_pere')->nullable();
            $table->string('Telephone_mere')->nullable();
            $table->string('Email')->nullable();
            $table->string('remarques')->nullable();
            $table->string('Filiere', 10)->nullable();
            $table->string('classe_actuelle', 10)->nullable();
            $table->boolean('boursier')->default(0);
            $table->string('ville_naissance')->nullable();
            $table->string('tuteur')->nullable();
            $table->string('telephone_tuteur')->nullable();
            $table->string('Compte_bancaire')->nullable();
            $table->string('etablissement_precedent')->nullable();
            $table->string('Groupe_sanguin')->nullable();
            $table->string('Maladies_chronique')->nullable();
            $table->boolean('handicape')->default(0);
            $table->string('religion')->nullable();
            $table->string('photo_etudiant', 150)->default('no_picture.jpg');
            $table->string('cin_etudiant', 15)->nullable();
            $table->string('passport_etudiant', 10)->nullable();
            $table->string('matricule_etudiant', 50)->nullable();
            $table->string('swift_etudiant', 50)->nullable();
            $table->boolean('actif')->default(1);
            $table->string('annee_encours', 10)->default('2021/2022');
            $table->tinyInteger('estSupprimer')->nullable();
            $table->string('fichier', 50)->nullable();
            $table->string('NomPrenom')->nullable();
            $table->date('Date_inscription')->nullable();
            $table->decimal('Mensualite', 18, 0)->default(0);
            $table->decimal('Annuite', 18, 0)->default(0);
            $table->decimal('Frais_Inscription', 18, 0)->default(0);
            $table->decimal('Solde', 18, 0)->default(0);
            $table->boolean('Situation_bloquee')->default(0);
            $table->string('raisons_blocages', 25)->nullable();
            $table->decimal('reliquat', 18, 0)->default(0);
            $table->string('emailPere')->nullable();
            $table->string('emailMere')->nullable();
            $table->string('emailTuteur')->nullable();
            $table->string('num_inscription', 15)->nullable();
            $table->string('derniere_Formation', 25)->nullable();
            $table->string('organisme', 50)->nullable();
            $table->string('dernierDiplome', 25)->nullable();
            $table->boolean('Dip_lega_x4')->default(0);
            $table->boolean('NivBac_lega_x4')->default(0);
            $table->boolean('CinLega_x4')->default(0);
            $table->boolean('EnvTinbre_x8')->default(0);
            $table->boolean('Photos_x8')->default(0);
            $table->boolean('ActNaissance')->default(0);
            $table->boolean('RamettePapierA4')->default(0);
            $table->boolean('dossier_complet')->default(0);
            $table->boolean('reglementInt_lega')->default(0);
            $table->boolean('Fiche_inscription')->default(0);
            $table->boolean('releves_notes')->default(0);
            $table->boolean('TestOrientation')->default(0);
            $table->integer('groupe')->default(1);
            $table->string('email_ecole')->nullable();
            $table->boolean('delegueDeClasse')->default(0);
            $table->boolean('membreBDE')->default(0);
            $table->string('NomPrenom_Arabe')->nullable();
            $table->boolean('paiementAnnuel')->default(0);
            $table->boolean('RégimeSpéciale')->default(0);
            $table->boolean('Lauréat')->default(0);
            $table->integer('rang')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}