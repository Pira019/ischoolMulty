<?php

namespace App\Repositories;

use App\Models\Absences;
use Illuminate\Support\Facades\DB;


class AbscencesRepository extends ResourceRepository

{


    /*
    Recherche classe, module, seance et année scolaire

    */

    private $inputs;



    public function __constructor(Absences $absence){

        $this->model = $absence;


    }


    // save absences
    public function save(Array $inputs){

        $finalAray = array();

        foreach($inputs['code_etudiant'] as $list => $value) {

          array_push($finalAray , array(

            'code_etudiant' => $value,
            'date_jour' => $inputs['date'],
            'code_seance' => $inputs['seance'],
            'anneeScolaire' => $inputs['annee'],
            'remarques' => $inputs['annee'],
            'AbscenceActive' => true,

          ));

        }


        Absences::insert($finalAray);
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

            ->Join('classe', function($join){
                $join->on('etudiants.classe_actuelle','=','classe.niveauClasse')
                    ->where('etudiants.classe_actuelle','=', $this->inputs['cls'] )
                    ->where('etudiants.Filiere','=', $this->inputs['fil'] );
            })

            ->leftJoin('absences',function($join){
                $join->on('etudiants.code_etudiant','=','absences.code_etudiant');

            })

            ->where('AbscenceActive',false)
            ->orWhere('AbscenceActive')
            ->where('absences.date_jour','=', $this->inputs['annee'])
            ->orWhere('absences.date_jour')

            ->select('etudiants.Nom_etudiant','etudiants.prenom_etudiant','etudiants.code_etudiant')

        ->get();
        return $getEtudiantPresent;


   }



    //etudiants abscents
    public function getAbscentsStudent(Array $datafilter){

        $this->inputs = $datafilter;

        $getEtudiants= DB ::table('etudiants')
            ->orderBy('etudiants.Nom_etudiant', 'asc')
            ->groupBy('etudiants.code_etudiant')

            ->Join('classe', function($join){
                $join->on('etudiants.classe_actuelle','=','classe.niveauClasse')
                    ->where('etudiants.classe_actuelle','=', $this->inputs['cls'] )
                    ->where('etudiants.Filiere','=', $this->inputs['fil'] )
                   ->where('etudiants.annee_encours','=', $this->inputs['annee'] );
            })

            ->leftJoin('absences',function($join){
                $join->on('etudiants.code_etudiant','=','absences.code_etudiant');
            })->where('AbscenceActive',true)
            ->where( 'absences.date_jour','=',$this->inputs['annee'])

            ->select('etudiants.Nom_etudiant','etudiants.prenom_etudiant','etudiants.code_etudiant')

            ->get();
        return $getEtudiants;


    }


}