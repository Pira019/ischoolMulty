<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 14/03/2022
 * Time: 13:02
 */

namespace App\Interfaces\Etudiant;


use App\Interfaces\IRessources;

interface IEtudiantRepository extends IRessources
{

    public function saveEtudiantAsUser();
    public function getProfil();



}