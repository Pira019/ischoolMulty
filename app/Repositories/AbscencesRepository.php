<?php

namespace App\Repositories;

use App\Models\class_mod_prof;

class AbscencesRepository
{


    /*
    Recherche classe, module, seance et année scolaire

    */


    public function getClassModule(){

        //classe module data base

        $classModuleProf = class_mod_prof::lazy();

        return $classModuleProf;
    }

}