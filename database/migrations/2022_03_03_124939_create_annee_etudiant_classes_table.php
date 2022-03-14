<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeEtudiantClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anneeClasses', function (Blueprint $table) {
          //  $table->id();
            $table->string('code_etudiant');
            $table->string('code_classe',10);
            $table->string('annee_scolaire',10);

             $table->primary(['code_etudiant', 'code_classe', 'annee_scolaire']);




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee_etudiant_classes');
    }
}
