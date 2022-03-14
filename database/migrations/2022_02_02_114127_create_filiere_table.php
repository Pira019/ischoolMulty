<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiere', function (Blueprint $table) {
            $table->string('code_filiere', 10)->primary();
            $table->string('Nom_filiere', 50)->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('responsableFiliere')->nullable();
            $table->date('annee_creationfiliere')->nullable();
            $table->string('NumAutoFilier', 25)->nullable();
            $table->string('NiveauDeFormation', 250)->nullable();
            $table->string('NvDiplomeSanctionant', 25)->nullable();
            $table->integer('nbAnneeFormation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filiere');
    }
}
