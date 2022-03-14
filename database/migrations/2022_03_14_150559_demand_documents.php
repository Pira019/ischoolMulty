<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DemandDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Demande_Documents', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('code_etudiant')->on('etudiants')->onDelete('restrict');

            $table->unsignedInteger('document_id');


            $table->string('anneeAccademique')->nullable();
            $table->string('status')->nullable();






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
