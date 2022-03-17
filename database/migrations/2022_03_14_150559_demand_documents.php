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


            $table->unsignedInteger('etudiant_id');
            $table->unsignedInteger('document_id');
            $table->string('annee')->nullable();
            $table->text('autre')->nullable();
            $table->string('status')->nullable();

            $table->primary(['etudiant_id', 'document_id', 'annee','status']);






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
