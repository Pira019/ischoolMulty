<?php

namespace App\Repositories;

use App\Models\class_mod_prof;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class AbscencesRepository
{


    /*
    Recherche classe, module, seance et année scolaire

    */

    private $inputs;

    public function getClassModule(){

        //classe module data base

        $classModuleProf = DB::table('class_mod_prof')
        ->Join('classe', 'class_mod_prof.codeClasse','=','classe.code_classe')->get();

        return $classModuleProf;
    }


    //etudiants prensents
    public function getPresentStudent(Array $datafilter){

        $this->inputs = $datafilter;

        $getEtudiantPresent = DB ::table('etudiants')
        ->orderBy('etudiants.Nom_etudiant', 'asc')
        ->groupBy('etudiants.code_etudiant')
        ->join('classe', function($join){
            $join->on('etudiants.classe_actuelle','=','classe.niveauClasse')
            ->where('etudiants.classe_actuelle','=', $this->inputs['cls'] )
            ->where('etudiants.Filiere','=', $this->inputs['fil'] );

        })

        ->leftJoin('absences',function($join_){
            $join_->on('etudiants.code_etudiant','=','absences.code_etudiant')
            ->where('absences.AbscenceActive',false)
            ->where('absences.date_jour','=',$this->inputs['anne']);
        })

        ->select('etudiants.Nom_etudiant','etudiants.prenom_etudiant')

        ->get();
        return $getEtudiantPresent;


   }


}