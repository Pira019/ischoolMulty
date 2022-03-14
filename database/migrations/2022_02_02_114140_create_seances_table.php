<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->string('code_seance', 10)->primary();
            $table->string('heureDebut', 50)->nullable();
            $table->string('heureFin', 5)->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            $table->integer('NbrHeures')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
