<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();

            $table->string('Organisme');
            $table->string('DirecteurGeneral')->nullable();
            $table->string('DirecteurPedagogique')->nullable();
            $table->string('ResponsablePedagogique')->nullable();
            $table->string('PresidentBDE')->nullable();
            $table->string('NbrAnneesEtudes')->nullable();
            $table->string('NombreSemestres')->nullable();
            $table->string('AnneeUniversitaireActive')->nullable();
            $table->string('DureeSeancesParDefaut')->nullable();
            $table->string('cheminServeur')->nullable();
            $table->string('nomBaseDeDonnees')->nullable();
            $table->string('userBD')->nullable();
            $table->string('pswBD')->nullable();
            $table->string('cheminRessourcesPhotos')->nullable();
            $table->string('userRessourcesPhotos')->nullable();
            $table->string('pswRessourcesPhotos')->nullable();
            $table->string('cheminRessourcesFiles')->nullable();
            $table->string('userRessourcesFiles')->nullable();
            $table->string('pswRessourcesFiles')->nullable();
            $table->string('emailEcole')->nullable();
            $table->string('siteWebEcole')->nullable();
            $table->string('sexeDirecPeda')->nullable();
            $table->string('emailMessagerieAuto')->nullable();
            $table->string('smtp')->nullable();
            $table->string('loginEmailAuto')->nullable();
            $table->string('pswEmailAuto')->nullable();
            $table->integer('smtpPort')->nullable();
            $table->tinyInteger('ssl')->nullable();
            $table->string('smsPortCom')->nullable();
            $table->string('telephone_ecole')->nullable();
            $table->string('fax_ecole')->nullable();
            $table->string('autorisationNum')->nullable();
            $table->date('date_autorisation')->nullable();
            $table->string('AdresseEcole')->nullable();
            $table->string('NomCompletOrganisme')->nullable();
            $table->integer('seuil_alert_abs_mens')->nullable();
            $table->string('autorisation_autre')->nullable();
            $table->string('dates_autorisation_autre')->nullable();
            $table->integer('coefControle')->nullable();
            $table->integer('coefEFMt')->nullable();
            $table->integer('coefEFMp')->nullable();
            $table->integer('coefSoutenance')->nullable();
            
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
        Schema::dropIfExists('parametres');
    }
}
