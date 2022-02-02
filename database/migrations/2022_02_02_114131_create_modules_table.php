<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->integer('code_module')->primary();
            $table->string('nom_module')->nullable();
            $table->integer('duree_heures')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->string('fichier_sylabus', 50)->nullable();
            $table->boolean('note_unique')->default(0);
            $table->string('classe', 10)->nullable();
            $table->string('filiere', 10)->nullable();
            $table->integer('prof')->nullable();
            $table->string('id_officiel', 50)->nullable();
            $table->integer('Coeficient')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
