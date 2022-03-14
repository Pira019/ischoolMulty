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
            $table->string('Organisme', 50)->primary();
            $table->string('DirecteurGeneral', 200)->nullable();
            $table->string('DirecteurPedagogique', 200)->nullable();
            $table->string('ResponsablePedagogique', 200)->nullable();
            $table->string('PresidentBDE', 200)->nullable();
            $table->string('NbrAnneesEtudes', 200)->nullable();
            $table->string('NombreSemestres', 200)->nullable();
            $table->string('AnneeUniversitaireActive', 200)->nullable();
            $table->string('DureeSeancesParDefaut', 200)->nullable();
            $table->string('cheminServeur', 200)->nullable();
            $table->string('nomBaseDeDonnees', 200)->nullable();
            $table->string('userBD', 200)->nullable();
            $table->string('pswBD', 200)->nullable();
            $table->string('cheminRessourcesPhotos', 200)->nullable();
            $table->string('userRessourcesPhotos', 200)->nullable();
            $table->string('pswRessourcesPhotos', 200)->nullable();
            $table->string('cheminRessourcesFiles', 10)->nullable();
            $table->string('userRessourcesFiles', 10)->nullable();
            $table->string('pswRessourcesFiles', 10)->nullable();
           /* $table->longblob('logoEcole');
            $table->longblob('EnteteEcole');
            $table->longblob('PiedEcole');*/
            $table->string('emailEcole', 200)->nullable();
            $table->string('siteWebEcole', 200)->nullable();
            $table->string('sexeDirecPeda', 10)->nullable();
            $table->string('emailMessagerieAuto', 25)->nullable();
            $table->string('smtp', 25)->nullable();
            $table->string('loginEmailAuto', 25)->nullable();
            $table->string('pswEmailAuto', 25)->nullable();
            $table->integer('smtpPort')->nullable();
            $table->tinyInteger('ssl')->nullable();
            $table->string('smsPortCom', 10)->nullable();
            $table->string('telephone_ecole', 25)->nullable();
            $table->string('fax_ecole', 25)->nullable();
            $table->string('autorisationNum', 25)->nullable();
            $table->date('date_autorisation')->nullable();
            $table->string('AdresseEcole', 200)->nullable();
            $table->string('NomCompletOrganisme', 100)->nullable();
            $table->integer('seuil_alert_abs_mens')->nullable();
            $table->string('autorisation_autre', 15)->nullable();
            $table->string('dates_autorisation_autre', 25)->nullable();
            $table->integer('coefControle')->nullable();
            $table->integer('coefEFMt')->nullable();
            $table->integer('coefEFMp')->nullable();
            $table->integer('coefSoutenance')->nullable();
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