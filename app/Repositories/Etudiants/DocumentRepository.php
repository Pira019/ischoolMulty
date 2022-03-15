<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 14/03/2022
 * Time: 16:01
 */

namespace App\Repositories\Etudiants;


use App\Interfaces\Etudiant\IDocumentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentRepository implements IDocumentRepository
{

    public function getDocumentByUser()
    {
        $getUserAuth = DB::table('users')->where('id',Auth::id())->first();
        $getStudent = DB::table('etudiants')->where('Email',$getUserAuth->email)->select('code_etudiant')->first();

        return DB::table('documents')->where('code_etudiant',$getStudent->code_etudiant)
            ->where('anneeAccademique',session('annee'))->get();
        // TODO: Implement getDocumentByUser() method.
    }

    public function save($data)
    {
        $getUserAuth = DB::table('users')->where('id',Auth::id())->first();

        $getStudent = DB::table('etudiants')->where('Email',$getUserAuth->email)->select('code_etudiant')->first();


        foreach ($data['doc'] as $list){

            DB::table('demande_documents')->insert([
                'etudiant_id' => $getStudent->code_etudiant,
                'document_id' => $list,
                'anneeAccademique' => session('annee'),
                'status' => 'En cours',
            ]);
        }

    }

    public function getAllDocuments()
    {
       $rqs = DB::table('documents')->orderBy('name')->get();

       return $rqs;
    }

}