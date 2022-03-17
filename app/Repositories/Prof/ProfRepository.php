<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 17/03/2022
 * Time: 12:00
 */

namespace App\Repositories\Prof;


use App\Interfaces\Prof\IProfesseur;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfRepository extends ResourceRepository implements IProfesseur
{

    public function __construct()
    {
    }



    public function getFilliere()
    {
        $this->model = 'class_mod_prof';

        return $this->getByFilter(
            ['codeProfesseur' => $this->getUserByEmail(),
              'anneeScolaire' => session('annee')  ]
        );

    }


    public function getClasses()
    {
        $getFil = func_get_arg(0);
         $getClasse = $this->getFilliere()
             ->where($getFil)
             ->join('classe','class_mod_prof.codeClasse','=','classe.code_classe')
             ->select('classe.code_classe','classe.niveauClasse')
             ->groupBy('classe.code_classe')->get();

         return $getClasse;

    }





    public function save($data)
    {
        // TODO: Implement save() method.
    }

    public function getUserByEmail()
    {
       $getUserByEmail = DB::table('personnel')->where('emailPersonnel',$this->getUserAuthEmail())
           ->select('CodePersonnel')->first();
       return $getUserByEmail->CodePersonnel;
    }


    public function getUserAuthEmail()
    {
        $getProfAuth =
            DB::table('users')->where('id',Auth::id())->select('email')->first();

        return $getProfAuth->email;
    }

    public function getStudentsByClasses($data)
    {
        $this->model = "anneeclasses";

        if(!empty(func_get_arg(1))){

       $getStudents = $this->getByFilter($data)
           ->join('etudiants','anneeclasses.code_etudiant','=','etudiants.code_etudiant','right')
           ->join('evaluation','evaluation.codeEtudiant','=','etudiants.code_etudiant','inner')
           ->orderBy('etudiants.Nom_etudiant')
           ->where('evaluation.codeModule',func_get_arg(1))
            ->get();

       return $getStudents;
        }
    }

    public function getModules()
    {
        return $this->getFilliere()
            ->where( func_get_arg(0))
            ->join('modules','class_mod_prof.codeModule','=','modules.code_module')->get();
    }
}