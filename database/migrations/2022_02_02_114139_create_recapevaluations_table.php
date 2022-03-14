<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecapevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recapevaluations', function (Blueprint $table) {
            $table->integer('codeEtudiant')->primary();
            $table->string('nomEtPrenom', 70)->nullable();
            $table->decimal('MCC1', 18, 2)->nullable();
            $table->decimal('MEFCFT1', 18, 2)->nullable();
            $table->decimal('MEFCFP1', 18, 2)->nullable();
            $table->decimal('MGP1', 18, 2)->nullable();
            $table->decimal('MCC2', 18, 2)->nullable();
            $table->decimal('MEFCFT2', 18, 2)->nullable();
            $table->decimal('MEFCFP2', 18, 2)->nullable();
            $table->decimal('NSTI', 18, 2)->nullable();
            $table->decimal('MGP2', 18, 2)->nullable();
            $table->decimal('NF', 18, 2)->nullable();
            $table->string('Filiere', 50)->nullable();
            $table->string('Promotion', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recapevaluations');
    }
}
