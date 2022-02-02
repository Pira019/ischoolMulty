<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrecalculmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrecalculmodules', function (Blueprint $table) {
            $table->integer('id_ParametreCalculModules')->primary();
            $table->integer('code_module')->nullable();
            $table->string('code_classe', 10)->nullable();
            $table->string('semestre', 10)->nullable();
            $table->string('anneeUniversitaire', 10)->nullable();
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
        Schema::dropIfExists('parametrecalculmodules');
    }
}
