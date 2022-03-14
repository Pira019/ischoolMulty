<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 03/03/2022
 * Time: 16:46
 */

namespace App\Repositories;


class AnneeAcademieRepository extends ResourceRepository
{
    public  function getAllYears(){
        $this->model ="annee";
        return $this->getByFilter([])->orderBy('annee_scolaire','asc')->select('annee_scolaire')->get();
    }

}