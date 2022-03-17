<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 17/03/2022
 * Time: 11:59
 */

namespace App\Interfaces\Prof;


use App\Interfaces\IRessources;

interface IProfesseur extends IRessources
{

    public function getFilliere();
    public function getUserAuthEmail();
    public function getUserByEmail();
    public function  getClasses();

    public function  getModules();

    //Pour evaluation
    public function getStudentsByClasses($data);
}