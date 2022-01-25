<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecapEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recap_evaluations', function (Blueprint $table) {
            $table->id();

            $table->integer('codeEtudiant');
            $table->string('nomEtPrenom')->nullable();
            $table->decimal('MCC1')->nullable();
            $table->decimal('MEFCFT1')->nullable();
            $table->decimal('MEFCFP1')->nullable();
            $table->decimal('MGP1')->nullable();
            $table->decimal('MCC2')->nullable();
            $table->decimal('MEFCFT2')->nullable();
            $table->decimal('MEFCFP2')->nullable();
            $table->decimal('NSTI')->nullable();
            $table->decimal('MGP2')->nullable();
            $table->decimal('NF')->nullable();
            $table->string('Filiere')->nullable();
            $table->string('Promotion')->nullable();
            
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
        Schema::dropIfExists('recap_evaluations');
    }
}
