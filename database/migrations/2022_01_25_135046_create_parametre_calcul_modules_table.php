<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametreCalculModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametre_calcul_modules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_ParametreCalculModules');
            $table->integer('code_module')->nullable();
            $table->string('code_classe')->nullable();
            $table->string('semestre')->nullable();
            $table->string('anneeUniversitaire')->nullable();
            $table->double('cc1')->nullable();
            $table->double('cc2')->nullable();
            $table->double('cc3')->nullable();
            $table->double('cc4')->nullable();
            $table->double('efm1')->nullable();
            $table->double('efm2')->nullable();
            $table->double('soutenance')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametre_calcul_modules');
    }
}
