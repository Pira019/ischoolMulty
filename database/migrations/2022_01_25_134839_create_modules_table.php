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
            $table->id();

            $table->integer('code_module');
            $table->string('nom_module')->nullable();
            $table->integer('duree_heures')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->string('fichier_sylabus')->nullable();
            $table->tinyInteger('note_unique')->nullable();
            $table->string('classe')->nullable();
            $table->string('filiere')->nullable();
            $table->integer('prof')->nullable();
            $table->string('id_officiel')->nullable();
            $table->integer('Coeficient')->nullable();
            
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
        Schema::dropIfExists('modules');
    }
}
