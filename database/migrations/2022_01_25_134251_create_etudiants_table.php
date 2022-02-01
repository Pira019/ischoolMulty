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
            $table->id();

            $table->integer('code_etudiant');
            $table->string('Nom_etudiant')->nullable();
            $table->string('prenom_etudiant')->nullable();
            $table->string('Nom_pere')->nullable();
            $table->string('Nom_mere')->nullable();
            $table->string('Adresse_permanante')->nullable();
            $table->string('Adresse_actuelle')->nullable();
            $table->string('Nationalité')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Sexe')->nullable();
            $table->dateTime('Date_naissance')->nullable();
            $table->string('Telephone_personnel')->nullable();
            $table->string('Telephone_pere')->nullable();
            $table->string('Telephone_mere')->nullable();
            $table->string('Email')->nullable();
            $table->string('remarques')->nullable();
            $table->string('Filiere')->nullable();
            $table->string('classe_actuelle')->nullable();
            $table->tinyInteger('boursier')->nullable();
            $table->string('ville_naissance')->nullable();
            $table->string('tuteur')->nullable();
            $table->string('telephone_tuteur')->nullable();
            $table->string('Compte_bancaire')->nullable();
            $table->string('etablissement_precedent')->nullable();
            $table->string('Groupe_sanguin')->nullable();
            $table->string('Maladies_chronique')->nullable();
            $table->tinyInteger('handicape')->nullable();
            $table->string('religion')->nullable();
            $table->string('photo_etudiant')->nullable();
            $table->string('cin_etudiant')->nullable();
            $table->string('passport_etudiant')->nullable();
            $table->string('matricule_etudiant')->nullable();
            $table->string('swift_etudiant')->nullable();
            $table->tinyInteger('actif');
            $table->string('annee_encours')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->string('fichier')->nullable();
            $table->string('NomPrenom')->nullable();
            $table->date('Date_inscription')->nullable();
            $table->decimal('Mensualite')->nullable();
            $table->decimal('Annuite')->nullable();
            $table->decimal('Frais_Inscription')->nullable();
            $table->decimal('Solde')->nullable();
            $table->tinyInteger('Situation_bloquee');
            $table->string('raisons_blocages')->nullable();
            $table->decimal('reliquat')->nullable();
            $table->string('emailPere')->nullable();
            $table->string('emailMere')->nullable();
            $table->string('emailTuteur')->nullable();
            $table->string('num_inscription')->nullable();
            $table->string('derniere_Formation')->nullable();
            $table->string('organisme')->nullable();
            $table->string('dernierDiplome')->nullable();
            $table->tinyInteger('Dip_lega_x4')->nullable();
            $table->tinyInteger('NivBac_lega_x4')->nullable();
            $table->tinyInteger('CinLega_x4')->nullable();
            $table->tinyInteger('EnvTinbre_x8')->nullable();
            $table->tinyInteger('Photos_x8')->nullable();
            $table->tinyInteger('ActNaissance')->nullable();
            $table->tinyInteger('RamettePapierA4')->nullable();
            $table->tinyInteger('dossier_complet')->nullable();
            $table->tinyInteger('reglementInt_lega')->nullable();
            $table->tinyInteger('Fiche_inscription')->nullable();
            $table->tinyInteger('releves_notes')->nullable();
            $table->tinyInteger('TestOrientation')->nullable();
            $table->integer('groupe')->nullable();
            $table->string('email_ecole')->nullable();
            $table->tinyInteger('delegueDeClasse')->nullable();
            $table->tinyInteger('membreBDE')->nullable();
            $table->string('NomPrenom_Arabe')->nullable();
            $table->tinyInteger('paiementAnnuel')->nullable();
            $table->tinyInteger('RégimeSpéciale')->nullable();
            $table->tinyInteger('Lauréat')->nullable();
            $table->integer('rang')->nullable();

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
        Schema::dropIfExists('etudiants');
    }
}