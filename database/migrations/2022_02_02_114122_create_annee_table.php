<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee', function (Blueprint $table) {
            $table->string('annee_scolaire', 10)->primary();
            $table->longText('remarques');
            $table->integer('nbr_management')->nullable();
            $table->integer('nbr_informatique')->nullable();
            $table->decimal('prct_absenteism', 18, 0)->nullable();
            $table->integer('nbr_laureats_management')->nullable();
            $table->integer('nbr_laureat_informatique')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee');
    }
}
