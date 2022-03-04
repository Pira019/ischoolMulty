<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 02/03/2022
 * Time: 12:09
 */

namespace App\Repositories\Padagogie;


use App\Models\Evaluation;
use App\Repositories\ResourceRepository;
use Illuminate\Database\QueryException;

class EvaluationRepository extends  ResourceRepository
{

        public function getFillière(array $data){
            $this->model = "class_mod_prof";
         return  $this->getByFilter($data); // TODO: Change the autogenerated stub
    }

    public function getStudentsByCodeClass(array  $data)
    {
      return $this->getByFilter($data)->get();
    }


    public function getClasses(array $data)
    {
        $this->model = 'classe';

        $getAllClasse = parent::getByFilter($data);


        return $getAllClasse->get();
    }

    //getProf by class & fil
    public function getProf(array $data){
        $this->model = 'class_mod_prof';

            return $this->getByFilter($data)
                ->join('personnel','class_mod_prof.codeProfesseur','=','personnel.CodePersonnel')->orderBy('personnel.NomPersonnel')
                ->select('personnel.NomPersonnel','personnel.PrenomPersonnel','personnel.CodePersonnel')->get();
    }

    public function getModulesByProfAndClass(array $data){
        $this->model = 'class_mod_prof';

        /* Data egal
        get codeClass field && prof && year academic from class_mod_prof table
         * */
        return $this->getByFilter($data)
            ->join('modules','class_mod_prof.codeModule','=','modules.code_module')
            ->select('modules.code_module','modules.nom_module')->get();
    }

    public function getStudent(array $data){
            $this->model = 'anneeclasses';

            return $this->getByFilter($data)
                ->join('etudiants','anneeclasses.code_etudiant','=','etudiants.code_etudiant')
                ->leftjoin('evaluation','etudiants.code_etudiant',"=","evaluation.codeEtudiant")->orderBy('etudiants.Nom_etudiant')->get();
    }


    public function saveEvalution(array $data){


            $finalArray = array();

        foreach ($data['module'] as $list) {

            Evaluation::create([
                "codeEvaluation" => time(),
                "codeEtudiant" => $list['code_etudiant'],
                "CC1" => $list['cc1']
            ]);

        }

}

}