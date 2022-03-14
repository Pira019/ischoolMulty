<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription', function (Blueprint $table) {
            $table->string('NumInscription', 50)->primary();
            $table->integer('CodeEtudiant')->nullable();
            $table->string('CodeFiliere', 50)->nullable();
            $table->string('CodeClasse', 50)->nullable();
            $table->date('dateInscription')->nullable();
            $table->string('AnnéeScolaire', 10)->nullable();
            $table->boolean('Active')->default(1);
            $table->boolean('Reussie')->default(0);
            $table->integer('niveau_année')->nullable();
            $table->decimal('moy_cc', 18, 0)->nullable();
            $table->decimal('moy_EFM_t', 18, 0)->nullable();
            $table->decimal('moy_efm_p', 18, 0)->nullable();
            $table->decimal('projetOUstage', 18, 0)->nullable();
            $table->decimal('moy_generale', 18, 0)->nullable();
            $table->string('appreciation', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscription');
    }
}
