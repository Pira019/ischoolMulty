<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 14/03/2022
 * Time: 16:01
 */

namespace App\Repositories\Etudiants;


use App\Interfaces\Etudiant\IDocumentRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentRepository implements IDocumentRepository
{

    public function getDocumentByUser()
    {
        $getUserAuth = DB::table('users')->where('id',Auth::id())->first();
        $getStudent = DB::table('etudiants')->where('Email',$getUserAuth->email)->select('code_etudiant')->first();

        return DB::table('demande_documents')->where('etudiant_id',$getStudent->code_etudiant)
            ->join('documents','demande_documents.document_id','=','documents.id')->orderBy('created_at','desc')->get();


    }

    public function save($data)
    {
        $getUserAuth = DB::table('users')->where('id',Auth::id())->first();

        $getStudent = DB::table('etudiants')->where('Email',$getUserAuth->email)->select('code_etudiant')->first();


        foreach ($data['doc'] as $list){

            try{

                DB::table('demande_documents')->insert([
                    'etudiant_id' => $getStudent->code_etudiant,
                    'document_id' => $list,
                    'annee' => empty(session('annee')) ? '2021/2022' :  session('annee'),
                    'status' => 'En cours',
                ]);

                return true;

            }catch (QueryException $e){

                return false;

            }


        }

    }

    public function getAllDocuments()
    {
       $rqs = DB::table('documents')->orderBy('name')->get();

       return $rqs;
    }

}