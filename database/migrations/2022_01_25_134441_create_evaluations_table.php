<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();

            $table->integer('codeEvaluation');
            $table->integer('codeEtudiant')->nullable();
            $table->string('nomPrenom')->nullable();
            $table->integer('codeModule')->nullable();
            $table->integer('codeProf')->nullable();
            $table->string('codeFiliere')->nullable();
            $table->string('Codeclasse')->nullable();
            $table->string('semestre')->nullable();
            $table->string('anneeUniversitaire')->nullable();
            $table->decimal('CC1')->nullable();
            $table->decimal('CC2')->nullable();
            $table->decimal('Efm')->nullable();
            $table->decimal('Efm2')->nullable();
            $table->decimal('moyenne')->nullable();
            $table->longText('remarques')->nullable();
            $table->decimal('CC3')->nullable();
            $table->decimal('CC4')->nullable();
            $table->integer('groupe')->nullable();
            $table->decimal('moyenneCC')->nullable();
            $table->dateTime('dateSaisie')->nullable();
            
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
        Schema::dropIfExists('evaluations');
    }
}
