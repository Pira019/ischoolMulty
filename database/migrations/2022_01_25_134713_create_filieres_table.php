<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();

            $table->string('code_filiere');
            $table->string('Nom_filiere')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('responsableFiliere')->nullable();
            $table->date('annee_creationfiliere')->nullable();
            $table->string('NumAutoFilier')->nullable();
            $table->string('NiveauDeFormation')->nullable();
            $table->string('NvDiplomeSanctionant')->nullable();
            $table->integer('nbAnneeFormation')->nullable();
            
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
        Schema::dropIfExists('filieres');
    }
}
