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
            $table->id();

            $table->integer('num_bon');
            $table->integer('code_etudiant')->nullable();
            $table->string('nom_prenom_etudiant')->nullable();
            $table->date('date_paiement')->nullable();
            $table->string('classe')->nullable();
            $table->decimal('montant_paye')->nullable();
            $table->string('mois')->nullable();
            $table->tinyInteger('espece')->nullable();
            $table->string('cheque')->nullable();
            $table->decimal('solde')->nullable();
            $table->string('remarque')->nullable();
            $table->string('anneeUniversitaire')->nullable();
            $table->string('typePaiement')->nullable();

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
        Schema::dropIfExists('paiements');
    }
}