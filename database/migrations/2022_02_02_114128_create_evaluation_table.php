<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->integer('codeEvaluation')->primary();
            $table->integer('codeEtudiant')->nullable();
            $table->string('nomPrenom', 50)->nullable();
            $table->integer('codeModule')->nullable();
            $table->integer('codeProf')->nullable();
            $table->string('codeFiliere', 10)->nullable();
            $table->string('Codeclasse', 10)->nullable();
            $table->string('semestre', 10)->nullable();
            $table->string('anneeUniversitaire', 10)->nullable();
            $table->decimal('CC1', 18, 2)->nullable();
            $table->decimal('CC2', 18, 2)->nullable();
            $table->decimal('Efm', 18, 2)->nullable();
            $table->decimal('Efm2', 18, 2)->nullable();
            $table->decimal('moyenne', 18, 2)->nullable();
            $table->longText('remarques');
            $table->decimal('CC3', 18, 2)->nullable();
            $table->decimal('CC4', 18, 2)->nullable();
            $table->integer('groupe')->nullable();
            $table->decimal('moyenneCC', 18, 2)->nullable();
            $table->dateTime('dateSaisie')->nullable();
            
            $table->foreign('codeFiliere', 'FK_evaluation_filiere')->references('code_filiere')->on('filiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation');
    }
}
