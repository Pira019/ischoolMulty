<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->integer('num_bon')->primary();
            $table->integer('code_etudiant')->nullable();
            $table->string('nom_prenom_etudiant')->nullable();
            $table->date('date_paiement')->nullable();
            $table->string('classe', 50)->nullable();
            $table->decimal('montant_paye', 15, 4)->nullable();
            $table->string('mois', 10)->nullable();
            $table->tinyInteger('espece')->nullable();
            $table->string('cheque', 50)->nullable();
            $table->decimal('solde', 18, 0)->nullable();
            $table->string('remarque')->nullable();
            $table->string('anneeUniversitaire', 10)->nullable();
            $table->string('typePaiement', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
