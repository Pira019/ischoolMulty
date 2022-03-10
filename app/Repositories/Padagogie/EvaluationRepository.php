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

use Illuminate\Support\Facades\DB;

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

    public function getStudent(array $data,$codeModule){
            $this->model = 'evaluation';

            return $this->getByFilter($data)
                ->join('anneeclasses','evaluation.codeEtudiant','=','anneeclasses.code_etudiant')
                ->join('etudiants','anneeclasses.code_etudiant','=','etudiants.code_etudiant')
                ->orderBy('etudiants.Nom_etudiant')
                ->get();
    }

  public function getModule($module){

            return $module;
  }



    public function saveEvalution(array $data){


            if ($data['code_etudiant']){

            foreach ($data['code_etudiant'] as $key => $insert)
            {

                $dataSave = [
                    'codeEvaluation' => $data['code_Evaluation'][$key],
                    'nomPrenom' => $data['name'][$key],
                    'codeEtudiant' => $insert,
                    'CC1'=> doubleval($data['cc1'][$key]),
                    'anneeUniversitaire'=> $data['annee_Universitaire'][$key],
                    'CC2'=> doubleval($data['cc2'][$key]),
                    'CC3'=> doubleval($data['cc3'][$key]),
                    'CC4'=> doubleval($data['cc4'][$key]),
                    'Efm'=> doubleval($data['efmt'][$key]),
                    'Efm2'=> doubleval($data['efmp'][$key]),
                    'codeFiliere'=>  $data['code_filliere'],
                    'codeModule'=>  intval($data['module']),
                    'codeProf'=>  $data['prof'],
                    'Codeclasse'=>  $data['cls'],
                    'dateSaisie'=>  $data['date'],
                    'remarques' => ' ',
                ];

                Evaluation::upsert(
                    array_filter($dataSave), ['codeEvaluation','codeModule'],
                    ['dateSaisie','codeFiliere','Efm','CC4','CC3','CC2','CC1']
                );

                //   DB::table('evaluation')->insert(array_filter($dataSave));
            }
            }



}

}