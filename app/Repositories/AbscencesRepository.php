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
            'mois' => date('m',strtotime($inputs['date'])) ,
            'code_seance' => $inputs['seance'],
            'anneeScolaire' => $inputs['annee'],
            'remarques' => $inputs['annee'],
            'professeur' => $inputs['prof'],
            'code_seance' => $inputs['seance'],
            'semestre' => $inputs['sem'],
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
                $join->on('etudiants.code_etudiant','=','absences.code_etudiant')
                ->where('absences.date_jour', '=', date('Y-m-d',strtotime($this->inputs['date'])) );

            })

            ->where('AbscenceActive',false)
            ->orWhere('AbscenceActive')


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
                    ->where('etudiants.Filiere','=', $this->inputs['fil'] ) ;
            })

            ->leftJoin('absences',function($join){
                $join->on('etudiants.code_etudiant','=','absences.code_etudiant')

                ->where('absences.date_jour', '=', date('Y-m-d',strtotime($this->inputs['date'])) );

            })->where('AbscenceActive',true)


            ->select('etudiants.Nom_etudiant','etudiants.prenom_etudiant','etudiants.code_etudiant')

            ->get();
        return $getEtudiants;


    }



    public function upDateAbsentStudent(Array $inputs){


        Absences::whereNotIn('AbscenceActive',$inputs['seance'])->update(

            ['Justifie' =>  $inputs['$abs'] && substr($inputs['$abs'],-1) == 'J' ? true : false]);


        /*$finalArray = array();

        foreach ($inputs['abs'] as $abs){
            array_push($finalArray, array(
                'Justifie' =>  $abs['$abs'] && substr($abs['$abs'],-1) == 'J' ? true : ''
            ));
        }

        Absences::update($finalArray);

*/


}


}
