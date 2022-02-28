<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 28/02/2022
 * Time: 14:04
 */

namespace App\Repositories;


class PersonnelRepository extends ResourceRepository
{


    public function __construct()
    {
        $this->model = "personnel";
    }

    public function getTeachers()
    {
        return $this->getAll(
            ['Professeur' => true]
        )->orderBy('NomPersonnel')
         ->orderBy('PrenomPersonnel')
           ->get();
    }

}