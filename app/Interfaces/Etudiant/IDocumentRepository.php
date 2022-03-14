<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 14/03/2022
 * Time: 16:00
 */

namespace App\Interfaces\Etudiant;


use App\Interfaces\IRessources;

interface IDocumentRepository extends IRessources
{

    public function getDocumentByUser();
    public function getAllDocuments();

}