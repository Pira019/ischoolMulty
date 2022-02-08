<?php

namespace App\Repositories;


use App\Models\Models\absences;
use Illuminate\Support\Facades\DB;


class AbscencesRepository extends ResourceRepository

{


    /*
    Recherche classe, module, seance et année scolaire

    */

    private $inputs;



    public function __constructor(absences $absence){

        $this->model = $absence;
    }


    // save absences
    public function save(Array $inputs){

        foreach($inputs['code_etudiant'] as $list ){
            
            $this->model->code_etudiant = $inputs['code_etudiant'];

            $this->store($this->model);
        }



    }


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

        ->select('etudiants.Nom_etudiant','etudiants.prenom_etudiant','etudiants.code_etudiant')

        ->get();
        return $getEtudiantPresent;


   }


}