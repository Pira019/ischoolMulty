<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annees', function (Blueprint $table) {
            $table->id();

            $table->string('annee_scolaire');
            $table->longText('remarques')->nullable();
            $table->integer('nbr_management')->nullable();
            $table->integer('nbr_informatique')->nullable();
            $table->decimal('prct_absenteism')->nullable();
            $table->integer('nbr_laureats_management')->nullable();
            $table->integer('nbr_laureat_informatique')->nullable();
            $table->tinyInteger('estSupprimer')->nullable();
            
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
        Schema::dropIfExists('annees');
    }
}
