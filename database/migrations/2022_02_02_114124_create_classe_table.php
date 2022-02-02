<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe', function (Blueprint $table) {
            $table->string('code_classe', 10)->primary();
            $table->string('nom_classe', 50)->nullable();
            $table->string('salle_principale', 10)->nullable();
            $table->string('code_Filiere', 10)->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('niveauClasse')->nullable();
            $table->integer('MasseHoraireAnnuelle')->nullable();
            $table->integer('TotalCoef')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classe');
    }
}
